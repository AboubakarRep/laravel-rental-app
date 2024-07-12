<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>



    <style>
        body {
            font-family: sans-serif;
        }

        .box-container {
            width: 80%;
            padding: 2rem;
            border: 1px solid #f2f2f2;
            border-radius: 5px;
            background-color: #ffffff;
            margin-left: 10%;
            margin-right: 10%;
        }

        .box-container .title {
            font-weight: bold;
            padding: 1rem;
            border-bottom: 1px solid #f2f2f2;
            background-color: #f2f2f2;
        }

        .transaction-box {
            margin-top: 1rem;
        }

        .transaction-box .item {
            display: table;
            width: 100%;
            margin-bottom: 1rem;
        }

        .transaction-box .item>* {
            display: table-cell;
            vertical-align: middle;
        }

        .transaction-box .item> :first-child {
            text-align-last: left;
        }

        .transaction-box .item> :last-child {
            text-align-last: right;
            font-weight: bold;
        }

        .transaction_details_box {
            margin-top: 3rem;
            border-radius: 5px;
            display: table;
            width: 100%;
            margin-bottom: 3rem;
        }

        .transaction_details_box .left {
            display: table;
            margin-bottom: 1rem;
            width: 100%;
        }

        .transaction_details_box .left>* {
            display: table-cell;
            vertical-align: middle;
        }



        .transaction_details_box .left .item {
            display: table;
            width: 100%;
            float: left;
            margin-bottom: 1rem;
        }

        .transaction_details_box .left .item>* {
            display: table-cell;
            vertical-align: middle;

            width: 100%;
            margin-bottom: 1rem;
        }

        .transaction_details_box .left .item> :first-child {
            text-align: left;
        }

        .transaction_details_box .left .item> :last-child {
            text-align: right;
        }

        .transaction_details_box .right {
            display: table;
            width: 100%;
        }

        .transaction_details_box .right table {
            width: 100%;
        }

        .transaction_details_box .right .payment_tile {
            margin-top: 2rem;
            margin-bottom: 2rem;
            text-transform: uppercase;
            font-weight: bold;
        }

        th {
            background: #8a97a0;
            color: #fff;
        }

        tr {
            background: #f4f7f8;
        }

        tr:nth-child(even) {
            background: #e8eeef;
        }

        th,
        td {
            padding: 0.5rem;
        }

        .single_item .value {
            font-weight: bold;
        }

            .logo-img {
        position: relative;
        max-height: 50px; /* Hauteur maximale de l'image */
        width: auto; /* Largeur automatique pour conserver les proportions */

        object-fit: contain;
        transform: scale(2.5);

    }

    </style>



</head>

<body>
    <div class="box-container">

        <div class="title">
            <b>Facture de paiement  {{config('app.name')}}</b>
        </div>

        <div class="transaction-box">


            <div class="item">
                <div class="label">Identifiant facture:</div>
                <div class="value">{{ $Facture->reference }}</div>
            </div>
            <div class="item">
                <div class="label">Nom & Prenoms</div>
                <div class="value">{{ $reservation->user->name }}  {{ $reservation->user->firstname }}</div>
            </div>
            <div class="item">
                <div class="label">Email:</div>
                <div class="value">{{ $reservation->user->email }}
                     </div>
            </div>
            <div class="item">
                <div class="label">Télephone:</div>
                <div class="value">+225 {{$reservation->user->contact}} </div>
            </div>
            <div class="item">
                <div class="label">Mois & Année:</div>
                <div class="value"> {{ $Facture->month }} {{ $Facture->year }} </div>
            </div>
            <div class="item">
                <div class="label">Duree de reservation:</div>
                <div class="value">Du {{ $reservation->date_debut }} aux {{  $reservation->date_fin }} </div>
            </div>
            <div class="item">
                <div class="label">Code de reservation:</div>
                <div class="value"> {{ $reservation->code_reservation }}  </div>
            </div>



        </div>

        <div class="last_item">

            <div class="title"> Resumé de la transaction
            </div>
            <div class="transaction_details_box">
                <div class="left">

                    <div class="item">
                        {{-- <div class="label">Référence:</div>
                        <div class="value">{{ $fullPaymentInfo->reference }}</div> --}}
                    </div>
                    <div class="item">
                        <div class="label">Frais</div>
                        <div class="value">0</div>
                    </div>
                </div>
                <div class="right">
                    <div class="payment_tile">Détails du paiement</div>
                    <table>
                        <thead>
                            <th>
                                Date
                            </th>
                            <th>Montant</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($Facture->launch_date)) }}</td>
                                <td>{{ $Facture->amount }}</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="single_item"> <span>Total</span>
                                        <span class="value"> {{ $Facture->amount }} FCFA</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <div class="single_item">
                                        <span>Total frais</span>
                                        <span class="value">0</span>
                                    </div>
                                    <div class="single_item">
                                        <span>Total payé</span>
                                        <span class="value">0</span>
                                    </div>
                                    <div class="single_item">
                                        <span>Reste a payer</span>
                                        <span class="value">0</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
