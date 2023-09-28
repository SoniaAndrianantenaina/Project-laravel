<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.jpg') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Planning congé</title>
</head>

<body>
    <main class="planning-congés">
        <div class="planning">
            <div class="center-content">
                <h2 class="planning__title">Planning congé</h2>
            </div>
        </div>

        <div class="planning">
            <div id="picker"></div>
            <div>
                <p>Selected date: <span id="selected-date"></span></p>
                <p>Selected time: <span id="selected-time"></span></p>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script type="text/javascript" src="{{ asset('js/mark-your-calendar.js') }}"></script>
            <script type="text/javascript">
                (function($) {
                    $('#picker').markyourcalendar({
                        availability: [
                            ['1:00', '2:00', '3:00', '4:00', '5:00'],
                            ['2:00'],
                            ['3:00'],
                            ['4:00'],
                            ['5:00'],
                            ['6:00'],
                            ['7:00']
                        ],
                        startDate: new Date("2023-09-01"),
                        onClick: function(ev, data) {
                            // data is a list of datetimes
                            var d = data[0].split(' ')[0];
                            var t = data[0].split(' ')[1];
                            $('#selected-date').html(d);
                            $('#selected-time').html(t);
                        },
                        onClickNavigator: function(ev, instance) {
                            var arr = [
                                [
                                    ['4:00', '5:00', '6:00', '7:00', '8:00'],
                                    ['1:00', '5:00'],
                                    ['2:00', '5:00'],
                                    ['3:30'],
                                    ['2:00', '5:00'],
                                    ['2:00', '5:00'],
                                    ['2:00', '5:00']
                                ],
                                [
                                    ['2:00', '5:00'],
                                    ['4:00', '5:00', '6:00', '7:00', '8:00'],
                                    ['4:00', '5:00'],
                                    ['2:00', '5:00'],
                                    ['2:00', '5:00'],
                                    ['2:00', '5:00'],
                                    ['2:00', '5:00']
                                ],
                                [
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00', '6:00', '7:00', '8:00'],
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00']
                                ],
                                [
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00', '6:00', '7:00', '8:00'],
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00'],
                                    ['4:00', '5:00']
                                ],
                                [
                                    ['4:00', '6:00'],
                                    ['4:00', '6:00'],
                                    ['4:00', '6:00'],
                                    ['4:00', '6:00'],
                                    ['4:00', '5:00', '6:00', '7:00', '8:00'],
                                    ['4:00', '6:00'],
                                    ['4:00', '6:00']
                                ],
                                [
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00'],
                                    ['3:00', '6:00'],
                                    ['4:00', '5:00', '6:00', '7:00', '8:00'],
                                    ['3:00', '6:00']
                                ],
                                [
                                    ['3:00', '4:00'],
                                    ['3:00', '4:00'],
                                    ['3:00', '4:00'],
                                    ['3:00', '4:00'],
                                    ['3:00', '4:00'],
                                    ['3:00', '4:00'],
                                    ['4:00', '5:00', '6:00', '7:00', '8:00']
                                ]
                            ]
                            var rn = Math.floor(Math.random() * 10) % 7;
                            instance.setAvailability(arr[rn]);
                        }
                    });
                })(jQuery);
            </script>
        </div>

    </main>
</body>

</html>
