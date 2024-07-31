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
    </style>
</head>
<body>
    <div class="container">
        <table border="1">
            <tr>
                <th>Image</th>
                <th>Daily Report</th>
                <th>Image</th>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td width="50%" style="vertical-align: top;">
                    <p style="margin: 0;">Project Name : {{ $report->project->projectName }}</p>
                    <p style="margin: 0;">Customer : {{ $report->project->customer }}</p>
                    <p style="margin: 0;">Address : {{ $report->project->address }}</p>
                </td>
                <td style="vertical-align: top;">
                    <p style="margin: 0;">Date : {{ \Carbon\Carbon::parse($report->date)->format('d M Y') }}</p>
                    <p style="margin: 0;">Day : {{ \Carbon\Carbon::parse($report->date)->format('D') }}</p>
                    <p style="margin: 0;">Period : {{ $report->project->period }}</p>
                </td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td colspan="2">MANPOWER</td>
                <td rowspan="2">PPE</td>
                <td colspan="2">EQUIPMENT</td>
                <td rowspan="2" colspan="3">WEATHER REPORT & TIME</td>
                <td rowspan="2">REMARKS</td>
            </tr>
            <tr>
                <td>Position</td>
                <td>Person</td>
                <td>Type</td>
                <td>Qty</td>
            </tr>
            <tr>
                <td>Project Manager</td>
                <td>{{ $manpowersArray['Project Manager']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Helm']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Helm
                    @else
                        <span class="icon-square"></span> Helm
                    @endif
                </td>
                <td>Exca</td>
                <td>{{ $equipmentsArray['Exca']['result'] ?? '' }}</td>
                <td>8:00 - 9:00</td>
                <td>13:00 - 14:00</td>
                <td>17:00 - 18:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Site Manager</td>
                <td>{{ $manpowersArray['Site Manager']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Uniform']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Uniform
                    @else
                        <span class="icon-square"></span> Uniform
                    @endif
                </td>
                <td>Buldozer</td>
                <td>{{ $equipmentsArray['Buldozer']['result'] ?? '' }}</td>
                <td>
                    @if ((string)($weathersArray['8:00 - 9:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['8:00 - 9:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
                    @if ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
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
                <td>{{ $manpowersArray['Supervisor']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Vest']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Vest
                    @else
                        <span class="icon-square"></span> Vest
                    @endif
                </td>
                <td>Vibro</td>
                <td>{{ $equipmentsArray['Vibro']['result'] ?? '' }}</td>
                <td>9:00 - 10:00</td>
                <td>14:00 - 15:00</td>
                <td>19:00 - 20:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Surveyor</td>
                <td>{{ $manpowersArray['Surveyor']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Safety Shoes']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety Shoes
                    @else
                        <span class="icon-square"></span> Safety Shoes
                    @endif
                </td>
                <td>Truck</td>
                <td>{{ $equipmentsArray['Truck']['result'] ?? '' }}</td>
                <td>
                    @if ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['9:00 - 10:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
                    @if ((string)($weathersArray['14:00 - 15:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['14:00 - 15:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
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
                <td>{{ $manpowersArray['Safety']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Safety Goggles']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety Goggles
                    @else
                        <span class="icon-square"></span> Safety Goggles
                    @endif
                </td>
                <td>Pick up</td>
                <td>{{ $equipmentsArray['Pick up']['result'] ?? '' }}</td>
                <td>10:00 - 11:00</td>
                <td>15:00 - 16:00</td>
                <td>20:00 - 21:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Civil</td>
                <td>{{ $manpowersArray['Civil']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Glove']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Glove
                    @else
                        <span class="icon-square"></span> Glove
                    @endif
                </td>
                <td>Crane</td>
                <td>{{ $equipmentsArray['Crane']['result'] ?? '' }}</td>
                <td>
                    @if ((string)($weathersArray['10:00 - 11:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['10:00 - 11:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
                    @if ((string)($weathersArray['15:00 - 16:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['15:00 - 16:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
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
                <td>{{ $manpowersArray['Mechanical']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Safety Mask']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Safety Mask
                    @else
                        <span class="icon-square"></span> Safety Mask
                    @endif
                </td>
                <td>Forklift</td>
                <td>{{ $equipmentsArray['Forklift']['result'] ?? '' }}</td>
                <td>11:00 - 12:00</td>
                <td>16:00 - 17:00</td>
                <td>21:00 - 22:00</td>
                <td></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td>{{ $manpowersArray['Operator']['person'] ?? '' }}</td>
                <td>
                    @if ($ppesArray['Ear Plug']['result'] ?? '' == 1)
                        <span class="icon-check-square"></span> Ear Plug
                    @else
                        <span class="icon-square"></span> Ear Plug
                    @endif
                </td>
                <td>Pancang</td>
                <td>{{ $equipmentsArray['Pancang']['result'] ?? '' }}</td>
                <td>
                    @if ((string)($weathersArray['11:00 - 12:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['11:00 - 12:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
                    @if ((string)($weathersArray['16:00 - 17:00']['result'] ?? '') == 0)
                        <span class="icon-check-square"></span> Bright <span class="icon-square"></span> Rain
                    @elseif ((string)($weathersArray['16:00 - 17:00']['result'] ?? '') == 1)
                        <span class="icon-square"></span> Bright <span class="icon-check-square"></span> Rain
                    @else
                        <span class="icon-square"></span> Bright <span class="icon-square"></span> Rain
                    @endif
                </td>
                <td>
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
                <td width="50%">ACTIVITY LIST</td>
                <td>ACTIVITY PLANNING LIST</td>
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
                <td colspan="7">POTENSION RISK</td>
            </tr>
            <tr>
                <td>Kimia</td>
                <td>Fisika</td>
                <td>Biologi</td>
                <td>Psikologi</td>
                <td>Ergonomi</td>
                <td>Behavior</td>
                <td>Condition</td>
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
                <td>Gangguan internal</td>
                <td>Cara kerja </td>
                <td>Unsafe condition</td>
                <td>Safe</td>
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
                <td>Gangguan External</td>
                <td>Posisi kerja </td>
                <td>Unsafe action</td>
                <td>Minor injury</td>
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
                <td>Lingkungan kerja</td>
                <td>Alat kerja</td>
                <td>Safety violation</td>
                <td>Major injury</td>
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
                <td>Beban angkat </td>
                <td></td>
                <td>Near miss</td>
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
                <td>Fatality</td>
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
                <td width="70%">
                    <p>Apakah pekerja telah menggunakan Alat pelindung diri (APD)</p>
                    <p>Apakah pekerja memahami resiko bahaya dari pekerjaannya</p>
                    <p>Apakah dilokasi kerja tersedia Alat pemadam api ringan (APAR)</p>
                    <p>Apakah tanda peringatan dan batas area kerja sudah terpasang</p>
                    <p>Apakah peralatan tangga dan perancah dalam kondisi aman</p>
                    <p>Apakah pekerja sudah menggunakan dan memproteksi terjatuh</p>
                    <p>Apakah Peralatan kerja sudah dirapihkan </p>
                    <p>Apakah lingkungan kerja sudah dibersihkan </p>
                </td>
                <td>
                    Note :
                </td>
            </tr>
        </table>
        <table border="1">
            <tr>
                <td>Approved by</td>
                <td>Checked by</td>
                <td>Prepared by</td>
            </tr>
            <tr>
                <td height=70px></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>(__________________)</td>
                <td>(__________________)</td>
                <td>(__________________)</td>
            </tr>
        </table>
    </div>
</body>
</html>
