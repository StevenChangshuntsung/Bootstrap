var hideCount = 0;
var next;

function deOpertr(Max) {
    var i = 0;
    hideCount = 0;
    while (i < Max) {
        if (next.length == 0) {
            break;
        }
        if (next.is(':visible')) {
            // console.log(next.children('td').html());
            next.hide('slow', function() {});
            hideCount++;
            next = next.next('tr');
            i++;
        } else {
            next = next.next('tr');
        }
    }
}

var lastTr;
var nexttt;
var showCount = 0;

function Opertr(Max) {
    var i = 0;
    showCount = 0;
    while (i < Max) {
        if (next.length == 0) {
            break;
        }
        if (next[0].rowIndex < nexttt[0].rowIndex) {
            break;
        }
        if (next.is(':visible')) {
            next = next.prev('tr');
            if (next[0].rowIndex != nexttt[0].rowIndex - 1) { /*排除 自己處理自己*/
                next.show('slow', function() {});
                showCount++;
                // console.log("A:" + next.children('td').html());
            }
            i++;
        } else {
            lastTr = next;
            next = next.next('tr');
            if (next.length == 0) {
                lastTr.show('slow', function() {});
                showCount++;
                // console.log("B:" + lastTr.children('td').html());
                next = lastTr.prev('tr');
                i++;
            }
        }
    }
}

var c = 0;
var t;
var Ewhich = 0;

function timedCount(element, millisec) {
    // console.log(Ewhich);
    var Max = 1;
    if(c >$("#maxTr").val()){Max = 100;}

    if (Ewhich == 1) {
        deOpertr(Max);
    } else if (Ewhich == 3) {
        Opertr(Max);
    }


    $(element).val(c);
    c = c + 1;
    t = setTimeout("timedCount('" + element + "', " + millisec + ")", millisec);

}

function stopCount() {
    clearTimeout(t);

}

function reCount(element, millisec) {
    c = 0;
    timedCount(element, millisec);
}

function setM1time(button, txt, sss) {
    $(button).mousedown(function(e) {
        if (e.which == 1) {
            reCount(txt, sss);
        }
    });
    $(button).mouseup(function(e) {
        if (e.which == 1) {
            stopCount()
        }
    });
}

function setM3time(button, txt, sss) {
    $(button).mousedown(function(e) {
        if (e.which == 3) {
            reCount(txt, sss);
        }
    });
    $(button).mouseup(function(e) {
        if (e.which == 3) {
            stopCount()
        }
    });
    $(button).contextmenu(function(e) {
        e.preventDefault(); /*消除右鍵選單*/
    });

}

function setTr_shadow() {

    $("#TrAccordion, #TrAccordion2").children('tr').each(function(index, el) {
        if (!$(this).is(':visible')) {
            $(this).prev().addClass("Tr_shadow");
        } else {
            $(this).prev().removeClass('Tr_shadow');
        }
    });

}

setM1time("#button1", "#txt1", 100);
setM3time("#button1", "#txt1", 100);

$("#TrAccordion, #TrAccordion2").children('tr').each(function(index, el) {
    var Trparent = $(this).parent()[0].id;
    var ThisTr = $(this);
    next = ThisTr.next('tr');
    var nextt = next;
    var sss = 400; /*調整速度*/
    if (Trparent == "TrAccordion") {
        sss = $("#Speed_1").val();
    } else if (Trparent == "TrAccordion2") {
        sss = $("#Speed_2").val();
    }

    $(this).children('td').each(function(index, el) {
        if (index == 0) {
            $(this).mousedown(function(e) {

                if (e.which == 1) {
                    hideCount = 0;
                    next = nextt;

                    Ewhich = e.which;
                    reCount("#txt1", sss);
                } else if (e.which == 3) {
                    lastTr = nextt;
                    next = nextt;
                    nexttt = nextt;

                    Ewhich = e.which;
                    reCount("#txt1", sss);
                }
            });
            $(this).mouseup(function(e) {
                if (e.which == 1 || e.which == 3) {
                    stopCount()
                }
            });
            $(this).contextmenu(function(event) {
                event.preventDefault(); /*消除右鍵選單*/
            });
            $(this).mouseout(function(e) { /*滑鼠離開時 中斷*/
                if (e.which == 1 || e.which == 3) {
                    stopCount()
                }
            });
            $(this).mouseover(function(event) {
                setTr_shadow();
            });
            $(this).mouseleave(function(event) {
                setTr_shadow();
            });


        }
    });
});
