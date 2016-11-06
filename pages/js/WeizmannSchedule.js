$(".wsShow").hide();


$("#afresh, #anext").addClass('btn-danger');

var chooseN = 0;

function Setchoose(ch) {
    if (chooseN > 0) {
        $("#choose_1, #choose_2").each(function(index, el) {
            $(this).toggleClass('btn-primary')
            $(this).toggleClass('btn-default')
        });
    } else if (chooseN == 0) {
        $("#anext").toggleClass('btn-danger')
        $("#anext").addClass('btn-success')

        ch.removeClass('btn-default')
        ch.addClass('btn-primary');

    }
    chooseN++;
}
$("#choose_1").mousedown(function(event) {
    Setchoose($(this));
    $("#Speed").val($("#Speed_1").val());
});
$("#choose_2").mousedown(function(event) {
    Setchoose($(this));
    $("#Speed").val($("#Speed_2").val());
});

/*重新按鈕設定*/
$("#afresh").click(function(event) {
    location.assign('weizmannSchedule.php');
});

/*存檔按鈕設定*/
$("#anext").click(function(event) {
    if (chooseN == 0) {
        alert("先點選擇按鈕");
    } else {

        // $("#wsShow")[0].target = "_blank";
        // $("#wsShow")[0].action = "weizmannScheduleincdo.php";
        // $("#wsShow").submit();
        // $("#wsShow")[0].target = "";
        // $("#wsShow")[0].action = "";

        // location.assign('weizmannSchedule.php');

        $("#NextPost").load('weizmannScheduleincdo.php', {
                Speed: $("#Speed").val(),
                maxTr: $("#maxTr").val()
            },
            function() {
                /* Stuff to do after the page is loaded */
            });


        $(this).attr('disabled', true);


    }
});

/*調快、調慢*/

$("#Speed_H").click(function(event) {
    $("#Speed_type").val("Speed_H");
    $("#wsShow").submit();
});
$("#Speed_S").click(function(event) {
    $("#Speed_type").val("Speed_S");
    $("#wsShow").submit();
});



/*隨機TR*/
$("#TrAccordion, #TrAccordion2").children('tr').each(function(index, el) {
	var trcss = $(this);
    $(this).children('td').each(function(index, el) {
        if (index == 0) {
            // console.log($(this).html());
            var maxNum = 10;
            var minNum = 0;
            var n = Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
            if (n>8) {
                trcss.attr('style','background-color:red;');
            }


        }
    });
});
