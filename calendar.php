<?php session_start(); include "php/connection.php"; if(!isset($_SESSION[ 'name'])){ header( 'Location: login.php'); } # TODO: Make this work with team_id rather than team_name if(isset($_GET[ 'teamname'])){ $teamname=$ _GET[ 'teamname']; $sql="SELECT team_id FROM `team` WHERE team_name = '$teamname'" ; $result2=m ysqli_query($conn, $sql); $row2=m ysqli_fetch_assoc($result2); $tid=$ row2[ 'team_id']; $_SESSION[ 'team_id']=$ tid; } ?>
<!DOCTYPE html>
<html lang="en">

<div w3-include-html="head.html"></div>

<body>
    <div id="wrapper">
        <div>
            <?php include "nav_bar.php"; ?>
        </div>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Drag and Drop Calendar (jQuery)
                            <small>Subheading</small>
                        </h1>
                    </div>
                </div>
                <div class="row">
<!--
                    this is how each full event should look like on the JSON
                    {
                        title: '$event-title',
                        start: '$start-dayT$start-time',
                        end: '$end-dayT$end-time',
                        color: '$colour',
                        url: '$event-url',
                        allDay: '$all-day' // this field has be True or False (cannot be Yes)
                    }, 
-->
                    <form>
                        <div class="form-group">
                            <label>Event Title<span>*</span>
                            </label>
                            <input type="text" class="form-control" id="event-title" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date<span>*</span>
                                    </label>
                                    <input type="date" class="form-control" id="start-day" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Time<span>*</span>
                                    </label>
                                    <input type="time" class="form-control" id="start-time" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date<span>*</span>
                                    </label>
                                    <input type="date" class="form-control" id="end-day" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Time<span>*</span>
                                    </label>
                                    <input type="time" class="form-control" id="end-time" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Colour<span>*</span>
                                    </label>
                                    <select class="form-control" id="colour" required>
                                        <option selected="true" id="colour-0">Red</option>
                                        <option id="colour-1">Blue</option>
                                        <option id="colour-2">Yellow</option>
                                        <option id="colour-3">Green</option>
                                        <option id="colour-4">Purple</option>
                                        <option id="colour-5">Orange</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Event URL</label>
                                    <input class="form-control" id="event-url">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>All Day</label>
                            <div class="checkbox-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="all-day" type="checkbox">Yes</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="row" style="margin-left:5px">
                </div>
                <div id="calendar" class="col-lg-8" width="100%"></div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->


    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/w3data.js"></script>
    <script>
        w3IncludeHTML();
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src='lib/moment.min.js'></script>
    <script src='lib/jquery.min.js'></script>
    <script src='lib/fullcalendar.min.js'></script>
    <script src='lib/jquery-ui.min.js'></script>
    <script>
        $(document).ready(function() {
            $('#external-events .fc-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });

            });
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                events: [{
                        title: 'Business Lunch',
                        start: '2016-12-03T13:00:00',
                        constraint: 'businessHours'
                    },

                    {
                        title: 'Meeting',
                        start: '2016-12-13T11:00:00',
                        constraint: 'availableForMeeting', // defined below
                        color: '#257e4a'
                    }, {
                        title: 'Conference',
                        start: '2016-12-18',
                        end: '2016-12-20'
                    }, {
                        title: 'Party',
                        start: '2016-12-29T20:00:00'
                    },

                    // areas where "Meeting" must be dropped
                    {
                        id: 'availableForMeeting',
                        start: '2016-12-11T10:00:00',
                        end: '2016-12-11T16:00:00',
                        rendering: 'background'
                    }, {
                        id: 'availableForMeeting',
                        start: '2016-12-13T10:00:00',
                        end: '2016-12-13T16:00:00',
                        rendering: 'background'
                    },

                    // red areas where no events can be dropped
                    {
                        start: '2016-12-24',
                        end: '2016-12-28',
                        overlap: false,
                        rendering: 'background',
                        color: '#ff9f89'
                    }, {
                        title: 'test event',
                        start: '2017-02-07',
                        end: '2017-02-07',
                        color: 'red'
                    }, {
                        title: "My repeating event",
                        start: '10:00', // a start time (10am in this example)
                        end: '14:00', // an end time (2pm in this example)
                        dow: [1, 4] // Repeat monday and thursday
                    }, {
                        start: '2016-12-06',
                        end: '2016-12-08',
                        overlap: false,
                        rendering: 'background',
                        color: '#ff9f89'
                    }
                ]
            });
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                }
            });

        });
    </script>
</body>

</html>