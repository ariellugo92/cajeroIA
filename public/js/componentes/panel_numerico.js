$(document).ready(function () {

    // para el boton 9
    $('#btn_num9').click(function (e) {
        e.preventDefault();

        pressBoton(9);
    });

    // para el boton 8
    $('#btn_num8').click(function (e) {
        e.preventDefault();

        pressBoton(8);
    });

    // para el boton 7
    $('#btn_num7').click(function (e) {
        e.preventDefault();

        pressBoton(7);
    });

    // para el boton 6
    $('#btn_num6').click(function (e) {
        e.preventDefault();

        pressBoton(6);
    });

    // para el boton 5
    $('#btn_num5').click(function (e) {
        e.preventDefault();

        pressBoton(5);
    });

    // para el boton 4
    $('#btn_num4').click(function (e) {
        e.preventDefault();

        pressBoton(4);
    });

    // para el boton 3
    $('#btn_num3').click(function (e) {
        e.preventDefault();

        pressBoton(3);
    });

    // para el boton 2
    $('#btn_num2').click(function (e) {
        e.preventDefault();

        pressBoton(2);
    });

    // para el boton 1
    $('#btn_num1').click(function (e) {
        e.preventDefault();

        pressBoton(1);
    });

    // para el boton 0
    $('#btn_num0').click(function (e) {
        e.preventDefault();

        pressBoton(0);
    });

    // para el boton de borrar
    $('#btn_numErase').click(function (e) {
        e.preventDefault();

        deleteNum();
    });

    var pin = false
    var arrayPin = [];

    // funcion al presionar un boton
    function pressBoton(num) {
        // si lo que se esta ingresando es el pin
        if (!pin) {
            if (arrayPin.length < 4) {
                arrayPin.push(num);
                getValueArrayPin();
            }
        }
    }

    // funcion para obtener los valores del arrayPin
    function getValueArrayPin() {
        var value = "";
        for (var index = 0; index < arrayPin.length; index++) {
            var element = arrayPin[index];

            value += element;
        }

        $('#pantallaPin').val(value);
    }

    // funcion para poner los botones enable
    function deleteNum(flag) {
        arrayPin.pop();
        getValueArrayPin();
    }
});