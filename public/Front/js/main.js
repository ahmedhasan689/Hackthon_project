function incrementValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 10 : value;
    value--;
    document.getElementById('number').value = value;
}

$(document).ready(function() {
    $('.like').click(function() {
        $(this).toggleClass('clicked');

    });
    $(".card").click(function() {

        $(this).stop();

    });
});
$(document).ready(function() {
    $(".product").click(function() {
        // $(".artWork").hide();
        $(".product").css("backgroundColor", "#198770");
        $(".product").css("color", "#fff");
        $(".control").css("backgroundColor", "transparent");
        $(".control").css("color", "#000");

        $(".contentProfile").show();
        $(".controlProfile").hide();

    });
});

$(document).ready(function() {
    $(".control").click(function() {
        // $(".artWork").hide();
        $(".control").css("backgroundColor", "#198770");
        $(".control").css("color", "#fff");
        $(".product").css("backgroundColor", "transparent");
        $(".product").css("color", "#000");
        $(".contentProfile").hide();
        $(".controlProfile").show();
        // $(".contentProfile").show();

    });
});

$(document).ready(function() {
    $(".change").click(function() {
        $(".form").toggle();


    });
});


var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};
