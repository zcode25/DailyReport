<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Report</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        .icon-square {
            display: inline-block;
            width: 7px;
            height: 7px;
            border: 1px solid #000;
        }

        .icon-check-square {
            position: relative;
            display: inline-block;
            width: 7px;
            height: 7px;
            border: 1px solid #000;
            background-color: #fff;
        }

        .icon-check-square::after {
            content: 'v';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 12px;
            color: #000;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="container">
        <table border="1">
            <tr>
                <th width="25%" style="padding: 5px"><img src="{{ public_path('image/logo.png')}}" alt="Logo" style="width: 50px"></th>
                <th style="font-size: 16px">Daily Report</th>
                <th width="25%"><img src="{{ public_path('image/k3.jpeg')}}" alt="K3" style="width: 50px"></th>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td width="50%" style="vertical-align: top;">
                    <table border="0" style="vertical-align: top;">
                        <tr>
                            <td width="25%" style="vertical-align: top;"><p style="margin: 0;">Project Name </p></td>
                            <td>: {{ $report->project->projectName }}</td>
                        </tr>
                        <tr>
                            <td width="25%" style="vertical-align: top;"><p style="margin: 0;">Customer </p></td>
                            <td>: {{ $report->project->customer }}</td>
                        </tr>
                        <tr>
                            <td width="25%" style="vertical-align: top;"><p style="margin: 0;">Address </p></td>
                            <td>: {{ $report->project->address }}</td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align: top;">
                    <table border="0" style="vertical-align: top;">
                        <tr>
                            <td width="25%" style="vertical-align: top;"><p style="margin: 0;">Date </p></td>
                            <td>: {{ \Carbon\Carbon::parse($report->date)->format('d M Y') }}</td>
                        </tr>
                        <tr>
                            <td width="25%" style="vertical-align: top;"><p style="margin: 0;">Day </p></td>
                            <td>: {{ \Carbon\Carbon::parse($report->date)->format('D') }}</td>
                        </tr>
                        <tr>
                            <td width="25%" style="vertical-align: top;"><p style="margin: 0;">Period </p></td>
                            <td>: {{ $report->project->period }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td colspan="2" style="text-align: center">MANPOWER</td>
                <td rowspan="2" style="text-align: center">PPE</td>
                <td colspan="2" style="text-align: center">EQUIPMENT</td>
                <td rowspan="2" colspan="3" style="text-align: center">WEATHER REPORT & TIME</td>
                <td rowspan="2" style="text-align: center">REMARKS</td>
            </tr>
            <tr>
                <td>Position</td>
                <td style="text-align: center">Person</td>
                <td>Type</td>
                <td style="text-align: center">Qty</td>
            </tr>
            <tr>
                <td>Project Manager</td>
                <td style="text-align: center">{{ $manpowersArray['Project Manager']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Helm']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Helm
                    @else
                        <span class="icon-square"></span> Helm
                    @endif
                </td>
                <td>Exca</td>
                <td style="text-align: center">{{ $equipmentsArray['Exca']['result'] ?? '' }}</td>
                <td style="text-align: center">8:00 - 9:00</td>
                <td style="text-align: center">13:00 - 14:00</td>
                <td style="text-align: center">17:00 - 18:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Site Manager</td>
                <td style="text-align: center">{{ $manpowersArray['Site Manager']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Uniform']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Uniform
                    @else
                        <span class="icon-square"></span> Uniform
                    @endif
                </td>
                <td>Buldozer</td>
                <td style="text-align: center">{{ $equipmentsArray['Buldozer']['result'] ?? '' }}</td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['8:00 - 9:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['8:00 - 9:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['17:00 - 18:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['17:00 - 18:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Supervisor</td>
                <td style="text-align: center">{{ $manpowersArray['Supervisor']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Vest']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Vest
                    @else
                        <span class="icon-square"></span> Vest
                    @endif
                </td>
                <td>Vibro</td>
                <td style="text-align: center">{{ $equipmentsArray['Vibro']['result'] ?? '' }}</td>
                <td style="text-align: center">9:00 - 10:00</td>
                <td style="text-align: center">14:00 - 15:00</td>
                <td style="text-align: center">19:00 - 20:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Surveyor</td>
                <td style="text-align: center">{{ $manpowersArray['Surveyor']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Safety Shoes']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety Shoes
                    @else
                        <span class="icon-square"></span> Safety Shoes
                    @endif
                </td>
                <td>Truck</td>
                <td style="text-align: center">{{ $equipmentsArray['Truck']['result'] ?? '' }}</td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['14:00 - 15:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['14:00 - 15:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['19:00 - 20:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['19:00 - 20:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Safety</td>
                <td style="text-align: center">{{ $manpowersArray['Safety']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Safety Goggles']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety Goggles
                    @else
                        <span class="icon-square"></span> Safety Goggles
                    @endif
                </td>
                <td>Pick up</td>
                <td style="text-align: center">{{ $equipmentsArray['Pick up']['result'] ?? '' }}</td>
                <td style="text-align: center">10:00 - 11:00</td>
                <td style="text-align: center">15:00 - 16:00</td>
                <td style="text-align: center">20:00 - 21:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Civil</td>
                <td style="text-align: center">{{ $manpowersArray['Civil']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Glove']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Glove
                    @else
                        <span class="icon-square"></span> Glove
                    @endif
                </td>
                <td>Crane</td>
                <td style="text-align: center">{{ $equipmentsArray['Crane']['result'] ?? '' }}</td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['10:00 - 11:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['10:00 - 11:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['15:00 - 16:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['15:00 - 16:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['20:00 - 21:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['20:00 - 21:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Mechanical</td>
                <td style="text-align: center">{{ $manpowersArray['Mechanical']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Safety Mask']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety Mask
                    @else
                        <span class="icon-square"></span> Safety Mask
                    @endif
                </td>
                <td>Forklift</td>
                <td style="text-align: center">{{ $equipmentsArray['Forklift']['result'] ?? '' }}</td>
                <td style="text-align: center">11:00 - 12:00</td>
                <td style="text-align: center">16:00 - 17:00</td>
                <td style="text-align: center">21:00 - 22:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td style="text-align: center">{{ $manpowersArray['Operator']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Ear Plug']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Ear Plug
                    @else
                        <span class="icon-square"></span> Ear Plug
                    @endif
                </td>
                <td>Pancang</td>
                <td style="text-align: center">{{ $equipmentsArray['Pancang']['result'] ?? '' }}</td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['11:00 - 12:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['11:00 - 12:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['16:00 - 17:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['16:00 - 17:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td style="text-align: center">
                    @if ((string)($weathersArray['21:00 - 22:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['21:00 - 22:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td></td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td width="50%" style="text-align: center">ACTIVITY LIST</td>
                <td style="text-align: center">ACTIVITY PLANNING LIST</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">
                    @foreach ($activitys as $activity)
                        <p style="margin: 0;">- {{ $activity->activityName }}</p>
                    @endforeach
                </td>
                <td style="vertical-align: top;">
                    @foreach ($activityPlans as $activityPlan)
                        <p style="margin: 0;">- {{ $activityPlan->activityPlanName }}</p>
                    @endforeach
                </td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td colspan="7" style="text-align: center">POTENSION RISK</td>
            </tr>
            <tr>
                <td style="text-align: center">Kimia</td>
                <td style="text-align: center">Fisika</td>
                <td style="text-align: center">Biologi</td>
                <td style="text-align: center">Psikologi</td>
                <td style="text-align: center">Ergonomi</td>
                <td style="text-align: center">Behavior</td>
                <td style="text-align: center">Condition</td>
            </tr>
            <tr>
                <td>
                    @if ($chemicalsArray['Debu']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Debu
                    @else
                        <span class="icon-square"></span> Debu
                    @endif
                </td>
                <td>
                    @if ($physicsArray['Iklim Kerja']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Iklim Kerja
                    @else
                        <span class="icon-square"></span> Iklim Kerja
                    @endif
                </td>
                <td>
                    @if ($biologysArray['Mikroorganisme']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Mikroorganisme
                    @else
                        <span class="icon-square"></span> Mikroorganisme
                    @endif
                </td>
                <td>
                    @if ($psikologysArray['Gangguan internal']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Gangguan internal
                    @else
                        <span class="icon-square"></span> Gangguan internal
                    @endif
                </td>
                <td>
                    @if ($ergonomysArray['Cara kerja']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Cara kerja
                    @else
                        <span class="icon-square"></span> Cara kerja
                    @endif
                </td>
                <td>
                    @if ($behaviorsArray['Unsafe condition']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Unsafe condition
                    @else
                        <span class="icon-square"></span> Unsafe condition
                    @endif
                </td>
                <td>
                    @if ($conditionsArray['Safe']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safe
                    @else
                        <span class="icon-square"></span> Safe
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($chemicalsArray['Cairan']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Cairan
                    @else
                        <span class="icon-square"></span> Cairan
                    @endif
                </td>
                <td>
                    @if ($physicsArray['Kebisingan']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Kebisingan
                    @else
                        <span class="icon-square"></span> Kebisingan
                    @endif
                </td>
                <td>
                    @if ($biologysArray['Arthopoda']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Arthopoda
                    @else
                        <span class="icon-square"></span> Arthopoda
                    @endif
                </td>
                <td>
                    @if ($psikologysArray['Gangguan external']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Gangguan external
                    @else
                        <span class="icon-square"></span> Gangguan external
                    @endif
                </td>
                <td>
                    @if ($ergonomysArray['Posisi kerja']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Posisi kerja
                    @else
                        <span class="icon-square"></span> Posisi kerja
                    @endif
                </td>
                <td>
                    @if ($behaviorsArray['Unsafe action']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Unsafe action
                    @else
                        <span class="icon-square"></span> Unsafe action
                    @endif
                </td>
                <td>
                    @if ($conditionsArray['Minor injury']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Minor injury
                    @else
                        <span class="icon-square"></span> Minor injury
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    @if ($chemicalsArray['Gas']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Gas
                    @else
                        <span class="icon-square"></span> Gas
                    @endif
                </td>
                <td>
                    @if ($physicsArray['Getaran']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Getaran
                    @else
                        <span class="icon-square"></span> Getaran
                    @endif
                </td>
                <td>
                    @if ($biologysArray['Hewan Invertebrata']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Hewan Invertebrata
                    @else
                        <span class="icon-square"></span> Hewan Invertebrata
                    @endif
                </td>
                <td>
                    @if ($psikologysArray['Lingkungan kerja']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Lingkungan kerja
                    @else
                        <span class="icon-square"></span> Lingkungan kerja
                    @endif
                </td>
                <td>
                    @if ($ergonomysArray['Alat kerja']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Alat kerja
                    @else
                        <span class="icon-square"></span> Alat kerja
                    @endif
                </td>
                <td>
                    @if ($behaviorsArray['Safety violation']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety violation
                    @else
                        <span class="icon-square"></span> Safety violation
                    @endif
                </td>
                <td>
                    @if ($conditionsArray['Major injury']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Major injury
                    @else
                        <span class="icon-square"></span> Major injury
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if ($physicsArray['Gelombang']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Gelombang
                    @else
                        <span class="icon-square"></span> Gelombang
                    @endif
                </td>
                <td>
                    @if ($biologysArray['Alergi']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Alergi
                    @else
                        <span class="icon-square"></span> Alergi
                    @endif
                </td>
                <td></td>
                <td>
                    @if ($ergonomysArray['Beban angkat']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Beban angkat
                    @else
                        <span class="icon-square"></span> Beban angkat
                    @endif
                </td>
                <td></td>
                <td>
                    @if ($conditionsArray['Near miss']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Near miss
                    @else
                        <span class="icon-square"></span> Near miss
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if ($physicsArray['Tekanan Udara']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Tekanan Udara
                    @else
                        <span class="icon-square"></span> Tekanan Udara
                    @endif
                </td>
                <td>
                    @if ($biologysArray['Binatang berbisa']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Binatang berbisa
                    @else
                        <span class="icon-square"></span> Binatang berbisa
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    @if ($conditionsArray['Fatality']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Fatality
                    @else
                        <span class="icon-square"></span> Fatality
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    @if ($physicsArray['Pencahayaan']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Pencahayaan
                    @else
                        <span class="icon-square"></span> Pencahayaan
                    @endif
                </td>
                <td>
                    @if ($biologysArray['Binatang berbisa']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Binatang berbisa
                    @else
                        <span class="icon-square"></span> Binatang berbisa
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td width="60%" style="vertical-align: top;">
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah pekerja telah menggunakan Alat pelindung diri (APD)</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah pekerja telah menggunakan Alat pelindung diri (APD)']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah pekerja telah menggunakan Alat pelindung diri (APD)']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah pekerja memahami resiko bahaya dari pekerjaannya</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah pekerja memahami resiko bahaya dari pekerjaannya']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah pekerja memahami resiko bahaya dari pekerjaannya']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah dilokasi kerja tersedia Alat pemadam api ringan (APAR)</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah dilokasi kerja tersedia Alat pemadam api ringan (APAR)']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah dilokasi kerja tersedia Alat pemadam api ringan (APAR)']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah tanda peringatan dan batas area kerja sudah terpasang</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah tanda peringatan dan batas area kerja sudah terpasang']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah tanda peringatan dan batas area kerja sudah terpasang']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah peralatan tangga dan perancah dalam kondisi aman</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah peralatan tangga dan perancah dalam kondisi aman']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah peralatan tangga dan perancah dalam kondisi aman']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah pekerja sudah menggunakan dan memproteksi terjatuh</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah pekerja sudah menggunakan dan memproteksi terjatuh']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah pekerja sudah menggunakan dan memproteksi terjatuh']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah Peralatan kerja sudah dirapihkan</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah Peralatan kerja sudah dirapihkan']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah Peralatan kerja sudah dirapihkan']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <table border="0">
                            <tr>
                                <td width="80%"><span style="margin: 0;">Apakah lingkungan kerja sudah dibersihkan</span></td>
                                <td>
                                    @if ((string)($questionsArray['Apakah lingkungan kerja sudah dibersihkan']['result'] ?? '') == 0)
                                        <span class="icon-check-square"></span> Yes <span class="icon-square"></span> No
                                    @elseif ((string)($questionsArray['Apakah lingkungan kerja sudah dibersihkan']['result'] ?? '') == 1)
                                        <span class="icon-square"></span> Yes <span class="icon-check-square"></span> No
                                    @else
                                        <span class="icon-square"></span> Yes <span class="icon-square"></span> No
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="vertical-align: top;">
                    Note :
                    <p style="margin: 0">{{ $notes->note }}</p>
                </td>
            </tr>
        </table>
        <table border="0" style="margin-top: 50px;">
            <tr>
                <td style="text-align: center">Approved by</td>
                <td style="text-align: center">Checked by</td>
                <td style="text-align: center">Prepared by</td>
            </tr>
            <tr>
                <td height=70px></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="text-align: center">(__________________)</td>
                <td style="text-align: center">(__________________)</td>
                <td style="text-align: center">(__________________)</td>
            </tr>
        </table>
    </div>
    <div class="page-break"></div>
    <div class="container">
        <h1>Hello</h1>
    </div>
</body>
</html>
