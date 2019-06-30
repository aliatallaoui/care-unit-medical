
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('inc.head')
    <title>Document</title>
    <style>
        @media screen {
            #printSection {
                display: none;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #printSection,
            #printSection * {
                visibility: visible;
            }

            #printSection {
                position: relative;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body class="container">
    {{--  <div>
        This should NOT be printed!
        <button id="btnPrint">Print (this button should also be NOT be printed)!</button>
    </div>
    <hr />  --}}

        @if (isset($rendez))

        <div id="printThis">
                <div class="text-center h2 mt-5">
                    REÇU DEMANDE DE RENDEZ VOUS DE MEDINO <br><br> DATE RENDEZVOUS:{{ $rendez->date_rdv }}
                </div>
                <br>
                <hr >
                <div class="row">
                    <div class="col-md-9">
                        <h3>FULL NAME: {{ $rendez->patient->name }} </h3><br>
                        <h3>Date dce naissence: {{ $rendez->patient->date_naissance }} </h3><br>
                        <h3>Sexe: {{ $rendez->patient->Sexe == '1' ? 'Male' : 'Female'}} </h3><br>
                        <h3>Email: {{ $rendez->patient->email }} </h3><br>
                        <h3>Name Doctor: {{ $rendez->doctor->name }} </h3><br>
                        <h3>Service: {{ $rendez->service->name }} </h3><br>
                    </div>
                </div>
                <div class="row  mt-5">
                <div class="col-md-12   mt-5 ">
                    <svg class="barcode pull-right" jsbarcode-value="{{ $BarCode }}" jsbarcode-textmargin="1"
                        jsbarcode-fontoptions="bold">
                    </svg>
                </div>
                </div>
        </div>
        {{--  <div id="printThisToo">
            <div class="container ">

            </div>
        </div>  --}}
        <button id="btnPrint" class="btn btn-primary">IMPRIME!</button>
        <a href="{{ route('home') }}" class="btn btn-danger">Return Home</a>

     @else
    @endif


    <script src="{{ asset('js/JsBarcode.all.min.js') }}">

    </script>

    <script>
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }
        document.getElementById("btnPrint").onclick = function() {
            printElement(document.getElementById("printThis"));
            //printElement(document.getElementById("printThisToo"), true, "<hr />");
            window.print();
        }

        JsBarcode(".barcode").init();
        function printElement(elem, append, delimiter) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            if (append !== true) {
                $printSection.innerHTML = "";
            } else if (append === true) {
                if (typeof (delimiter) === "string") {
                    $printSection.innerHTML += delimiter;
                } else if (typeof (delimiter) === "object") {
                    $printSection.appendChlid(delimiter);
                }
            }

            $printSection.appendChild(domClone);
        }





    </script>
</body>

</html>
