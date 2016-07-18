/**
 * Created by tuyenhuynh on 14/07/16.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var currentIndex = 0;

var weekday = new Array(7);
weekday[0]=  "ВС";
weekday[1] = "ПН";
weekday[2] = "ВТ";
weekday[3] = "СР";
weekday[4] = "ЧТ";
weekday[5] = "ПТ";
weekday[6] = "СБ";

var dateList = $('ul#dates li');
var count = $('ul#dates li').length;
var startDate =  new Date();
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

        if(currentDay == 6 || currentDay == 0) {
            button.removeClass('btn-default').addClass('btn-grey');
        }
    }

}

updateCalendar();

$('ul#dates li button').click(function(e){

    e.preventDefault();

    var index = $(this).parent().index();
    var prevSelectedButton = dateList.eq(currentIndex).children('button');
    prevSelectedButton.removeClass('btn-success');

    if(currentIndex == 0 || currentIndex == 6) {
        prevSelectedButton.addClass('btn-grey');
    }else {
        prevSelectedButton.addClass('btn-default');
    }

    currentIndex = index;

    var selectedDate = new Date(startDate.getYear() +1900, startDate.getMonth(), startDate.getDate() + index);

    $(this).addClass('btn-success');

    $.ajax({
        url:'/ajax-get-concert-by-date',
        type:'post',
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
                    + '<img  src=' +  concert.image_path + ' height=100%>'
                    + '</div>'
                    + '<div class="caption">'
                    + '<h4 class="pull-right">' + concert.audience_count  + '</h4>'
                    + '<h4><a href="/concerts/' + concert.id +'">' + concert.name +'</a></h4>'
                    + '<p>' + concert.description + '</p>'
                    + ' </div>'
                    + '<div class="concert-time">'
                    +        '<p>'
                    +        '<span class="glyphicon glyphicon-time"></span>'
                    +        'concert.date_time'
                    + '</p>'
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

});

$('#next').click(function() {
    startDate.setDate(startDate.getDate() + 1);
    updateCalendar();
});

$('#prev').click(function() {
    startDate.setDate(startDate.getDate() -1);
    updateCalendar();
});
