/**
 * Created by tuyenhuynh on 14/07/16.
 */

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function highlightActiveNav(){
        var url = window.location.href;
        var tokens = url.split('/');

        $('ul#nav li a').each(function(){
            if(url == this.href) {
                $(this).addClass('active-link');
            }
        });

        // var liItem;
        // if(tokens[3] =="index") {
        //     liItem = $('ul#nav li').eq(0);
        // }else if(tokens[3] == "afisha"){
        //     liItem = $('ul#nav li').eq(1);
        // }else if(tokens[3] == "biletnye_kassy") {
        //     liItem = $('ul#nav li').eq(2);
        // }else if(tokens[3] == "hall"){
        //     liItem = $('ul#nav li').eq(3);
        // }else if(tokens[3] == "contact") {
        //     liItem = $('ul#nav li').eq(4);
        // }
        // liItem.children('a').addClass('active-link');

    };

    highlightActiveNav();

    var currentIndex = -1;

    var weekday = ['ВС', 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'];

    var months = ['Январь',
        'Февраль',
        'Март',
        'Апрель',
        'Май',
        'Июнь',
        'Июль',
        'Август',
        'Сентябрь',
        'Октябрь',
        'Ноябрь',
        'Декабрь'];


    var dateList = $('ul#dates li');
    var count = $('ul#dates li').length;
    var startDate =  new Date();

//change displayed month to be the month of the left-most button
    function updateMonth(month) {
        $('h4.current-month').html('Aфиша ЦКЗ на ' + months[month]);
    }

//get concerts of selected date
    function getConcertsByButton(button, index) {
        //var index = .parent().index();
        var prevSelectedButton = dateList.eq(currentIndex).children('button');
        prevSelectedButton.removeClass('btn-success');

        if(currentIndex == 0 || currentIndex == 6) {
            prevSelectedButton.addClass('btn-grey');
        }else {
            prevSelectedButton.addClass('btn-default');
        }

        currentIndex = index;

        var selectedDate = new Date(startDate.getYear() +1900, startDate.getMonth(), startDate.getDate() + index);

        $.ajax({
            url:'/ajax-get-concert-by-date',
            type:'POST',
            data: {
                'date': selectedDate.toDateString()
            },
            success: function (data, status) {
                $('#concerts').empty();
                data.forEach(function(concert, pos, data ){


                    var text = "<li>"
                        + '<div class="col-sm-4 col-lg-4 col-md-4">'
                        + '<div class="thumbnail">'
                        + '<div style="max-width: 350px;  height:200px;">'
                        + '<img  src=' +  concert.photo_path + ' height=100%>'
                        + '</div>'
                        + '<div class="caption">'
                        + '<h4 class="pull-right">' + concert.audience_count  + '</h4>'
                        + '<h4><a href="' + concert.link +'">' + concert.name +'</a></h4>'
                        + '<p>' + concert.description + '</p>'
                        + ' </div>'
                        + '<div class="concert-time" style="padding:20px">'
                        +  '<p>'
                        +        '<span class="glyphicon glyphicon-time" style="padding-right:10px"></span>'
                        +        concert.displayed_date_time
                        +  '</p>'
                        + '</div>'
                        + '<div class="text-center center-block">'
                        + '<a class="btn btn-primary" role="button" href="#" style="margin-bottom: 10px">Купить билет</a>'
                        + '</div>'
                        +'</div>'
                        +'</div>'
                        +'</li>';
                    $('#concerts ').append(text);
                });
            }
        });

    }

//this function change color of button and keep the color of selected button green,
// no matter what user click to left or right
    function updateCalendar() {

        var d = startDate.getDate(),
            m = startDate.getMonth(),
            y = startDate.getYear() + 1900;

        for (var i = 0 ; i < count ; ++i) {

            var date = new Date(y,m, d + i);
            var currentElement = dateList.eq(i);
            var currentDay = date.getDay();
            var button = currentElement.children('button');
            button.html (weekday[currentDay] + "<br>" +  date.getDate());
            button.removeClass('btn-default').removeClass('btn-grey').removeClass('btn-success');
            if(currentDay == 6 || currentDay == 0) {
                button.addClass('btn-grey');
            }else {
                button.addClass('btn-default');
            }
        }

        updateMonth(startDate.getMonth());

    }

    updateCalendar();

//update concert list for selected date
    function updateCurrentDate(){
        if(currentIndex == -1) {
            currentIndex = 0;
        }
        getConcertsByButton($('ul#dates li').eq(currentIndex), currentIndex);
        $('ul#dates li').eq(currentIndex).children('button').removeClass('btn-default').removeClass('btn-grey').addClass('btn-success');

    };

//update conert list
    $('ul#dates li button').click(function(e){
        e.preventDefault();
        $(this).removeClass('btn-default').removeClass('btn-grey').addClass('btn-success');
        getConcertsByButton(this, $(this).parent().index());
    });


    $('#next').click(function() {
        startDate.setDate(startDate.getDate() + 1);
        updateCalendar();
        updateCurrentDate();
    });

    $('#prev').click(function() {
        //currentIndex = -1;
        startDate.setDate(startDate.getDate() -1);
        updateCalendar();
        updateCurrentDate();
    });

    $('a.btn-purchase').click(function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        $('#myModal iframe').attr('src', url );
    });
});




