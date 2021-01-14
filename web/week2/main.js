const colorInput = document.getElementById('color')

function clickedFunction() {
    alert('Clicked...')
}

function changeColor() {
    document.getElementById('div1').style.color = colorInput.value;
}

$("#button").click(function() {
    var color = $('#color').val()
    console.log(color)
    $("#div1").css('color', color);
});

$("#toggle").click(function() {
    $('#div3').fadeToggle(2000)
})
