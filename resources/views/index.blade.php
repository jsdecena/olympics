<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Olympics Schedule</title>
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Sports Updates</h1>
                <table class="table table-striped">
                    <thead>
                        <th>Sports</th>
                    </thead>
                </table>
                <tbody>
                    <tr>
                        <td>
                            Basketball
                            <table class="table">
                                <thead>
                                    <th class="col-md-1">Team 1</th>
                                    <th class="col-md-1">Score</th>
                                    <th class="col-md-1">Team 2</th>
                                    <th class="col-md-1">Score</th>
                                    <th class="col-md-8">Schedule</th>
                                </thead>
                                <tbody>
                                    @foreach($schedules as $sched)
                                    <tr>
                                        <td>
                                            {{$sched->team1}} @if($sched->team1_score < $sched->team2_score) <span class="label label-danger">def</span> @endif 
                                        </td>
                                        <td>@if($sched->team1_score>0) {{$sched->team1_score}} @else - @endif</td>
                                        <td>
                                            {{$sched->team2}} @if($sched->team2_score < $sched->team1_score) <span class="label label-danger">def</span> @endif
                                        </td>
                                        <td>@if($sched->team2_score>0){{$sched->team2_score}}@else - @endif</td>
                                        <td>
                                            {{-- GET IF THE CURRENT TIME IS WITHIN THE TIME UNTIL --}}
                                            <?php $now          = new \DateTime('now', new DateTimeZone('Asia/Manila'));  ?>
                                            <?php $timeUntil    = new \DateTime($sched->time_until, new DateTimeZone('Asia/Manila')); ?>

                                            @if( $now > $timeUntil)
                                                <?php $interval = $now->diff($timeUntil); ?>
                                                
                                                @if($interval->format('%h') == 0)
                                                    currently playing
                                                @else
                                                    {{ $interval->format('%h hour ago')}}
                                                @endif
                                            @else
                                                in {{$timeUntil->format('H')}} hours
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </div>
        </div>
    </div>

<script type="text/javascript" src="{{asset('js/all.js')}}"></script>    
</body>
</html>