@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Calendar</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h4 class="box-title">Kéo thả sự kiện</h4>
                    </div>
                    <div class="box-body">
                        <!-- the events -->
                        <div id="external-events">
                            @foreach($eventOptions as $eventOption)
                            <div class="external-event" style="background-color: {{ $eventOption->color }}; border-color: {{ $eventOption->color }}; color: #fff">{{ $eventOption->title }}</div>
                            @endforeach
                            {{--<div class="external-event bg-fuchsia">Ăn sáng</div>
                            <div class="external-event bg-green">Ăn trưa</div>
                            <div class="external-event bg-aqua">Ăn tối</div>
                            <div class="external-event bg-yellow">Đi làm</div>
                            <div class="external-event bg-blue">Về nhà</div>
                            <div class="external-event bg-red">Đi ngủ</div>
                            <div class="external-event bg-orange">Chơi game</div>
                            <div class="external-event bg-purple">Học tiếng anh</div>--}}
                            <div class="checkbox">
                                <label for="drop-remove">
                                    <input type="checkbox" id="drop-remove">
                                    Xóa sau khi kéo
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tạo sự kiện</h3>
                    </div>
                    <div class="box-body">
                        <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                            <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                            <ul class="fc-color-picker" id="color-chooser">
                                <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                                <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                            </ul>
                        </div>
                        <!-- /btn-group -->
                        <div class="input-group">
                            <input id="new-event" type="text" class="form-control" placeholder="Tiêu đề sự kiện">
                            <div class="input-group-btn">
                                <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Tạo</button>
                            </div>
                            <!-- /btn-group -->
                        </div>
                        <label id="new-event-error" class="error"></label>
                        <!-- /input-group -->
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <script>
        $(function () {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function init_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            init_events($('#external-events div.external-event'))
            /* initialize the calendar
             -----------------------------------------------------------------*/

            var events = {!! $events !!}

            $('#calendar').fullCalendar({
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'month,agendaWeek,agendaDay'
                },
                locale: 'vi',
                //Random default events
                events    : events,
                selectable  : true,
                editable  : true,
                droppable : true, // this allows things to be dropped onto the calendar !!!
                drop      : function (date, allDay) { // this function is called when something is dropped
                    // retrieve the dropped element's stored Event Object

                    var hour = date.hour()
                    var minute = date.minute()
                    var second = date.second()
                    var isAllDay = null

                    if (hour == 0 && minute == 0 && second == 0) {
                        if (moment().hour(0).minute(0).second(0).diff(date, 'seconds') > 0) {
                            toastr.error('Không thể tạo sự kiện trong thời gian quá khứ.', 'Lỗi');
                            return ;
                        }
                        isAllDay = 1
                    } else {
                        if (moment().diff(date, 'seconds') > 0) {
                            toastr.error('Không thể tạo sự kiện trong thời gian quá khứ.', 'Lỗi');
                            return ;
                        }
                        isAllDay = 0
                    }

                    var originalEventObject = $(this).data('eventObject')
                    var vm = this

                    $.ajax({
                        data: {
                            is_recurrent: 0,
                            start_date: date.format('YYYY-MM-DD'),
                            start_time: date.format('HH:mm'),
                            title: originalEventObject.title,
                            color: $(vm).css('background-color'),
                            is_all_day: isAllDay,
                        },
                        type: 'POST',
                        dataType: "JSON",
                        url: '/admin/events',
                        success: function(response)
                        {
                            // we need to copy it, so that multiple events don't have a reference to the same object
                            var copiedEventObject = $.extend({}, originalEventObject)
                            // assign it the date that was reported
                            copiedEventObject.start           = date
                            copiedEventObject.allDay          = allDay
                            copiedEventObject.backgroundColor = $(vm).css('background-color')
                            copiedEventObject.borderColor     = $(vm).css('border-color')
                            // render the event on the calendar
                            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                            // is the "remove after drop" checkbox checked?
                            if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(vm).remove()
                            }
                            toastr.success(response.message, 'Thành công');
                        },
                        error: function(error) {
                            var response = error.responseJSON
                            var statusCode = error.status

                            if(statusCode == 403) {
                                return toastr.error(response.message, 'Lỗi');
                            }
                            toastr.error('Máy chủ gặp lỗi.', 'Lỗi');
                        }
                    });

                },
                eventClick: function(event) {
                    console.log(event)
                },
                dayClick: function(date) {
                    console.log('clicked ' + date.format('YYYY-MM-DD HH:mm:ss'));
                },
                select: function(startDate, endDate) {
                    console.log('selected ' + startDate.format('YYYY-MM-DD HH:mm:ss') + ' to ' + endDate.format('YYYY-MM-DD HH:mm:ss'));
                },
                eventResize: function(event, delta, revertFunc) {
                    console.log('eventResize')
                },
                eventResizeStart: function( event, jsEvent, ui, view ) {
                    console.log('eventResizeStart')
                }
            })

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            //Color chooser button
            var colorChooser = $('#color-chooser-btn')
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                createEventOption();
            })
            function createEventOption () {
                const data = {
                    title: $('#new-event').val(),
                    color: $('#add-new-event').css('background-color'),
                }
                $.ajax({
                    data: data,
                    type: 'POST',
                    dataType: "JSON",
                    url: '/admin/event-options',
                    success: function(response)
                    {
                        //Create events
                        var val = $('#new-event').val()
                        var event = $('<div />')
                        event.css({
                            'background-color': $('#add-new-event').css('background-color'),
                            'border-color'    : $('#add-new-event').css('background-color'),
                            'color'           : '#fff'
                        }).addClass('external-event')
                        event.html(val)
                        $('#external-events').prepend(event)

                        //Add draggable funtionality
                        init_events(event)

                        //Remove event from text input
                        $('#new-event').val('')
                        $('#new-event-error').text('')
                        toastr.success(response.message, 'Thành công');
                    },
                    error: function(error) {
                        const responseError = error.responseJSON
                        if (error.status == 422) {
                            if(responseError.errors.title) {
                                $('#new-event-error').text(responseError.errors.title)
                            }
                        }
                        toastr.error(responseError.message, 'Lỗi');
                    }
                });
            }

            $('.external-event').dblclick(function (e) {

            })
        })
    </script>
@endpush
