$(document).ready(function () {

    // capturando el evento al precionar los labels
    // derechos
    $('#btn1_der').click(function (e) {
        e.preventDefault();

        var opc = $('#lbl1_der').html();
        getAccionLabel(opc)
    });

    $('#btn2_der').click(function (e) {
        e.preventDefault();

        var opc = $('#lbl2_der').html();
        getAccionLabel(opc)
    });

    $('#btn3_der').click(function (e) {
        e.preventDefault();

        var opc = $('#lbl3_der').html();
        getAccionLabel(opc)
    });

    $('#btn4_der').click(function (e) {
        e.preventDefault();

        var opc = $('#lbl4_der').text();
        getAccionLabel(opc)
    });

    // funcion al precionar un labels
    function getAccionLabel(opc) {
        var opcTrim = opc.trim();
        var opcLowerCase = opcTrim.toLowerCase();

        switch (opcLowerCase) {
            case 'ingresar':
                validarPin();
                break;

            default:
                break;
        }
    }

    // funcion para ingresar dsps de ingresar el pin
    function validarPin() {
        var pin = $('#pantallaPin').val();
        if (pin.length < 4) {
            setErrorShow('El PIN debe de contener 4 digitos', 'red');
            return;
        }

        // validando por ajax si el pin es correcto
        var ruta = 'retiros/';
        var dato = pin;
        get_ajax(ruta, dato, 'get');
    }

    // metodo para enviar el ajax
    function get_ajax(ruta, dato, tipo) {
        var parametro = {
            param : dato
        };
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: ruta,
            headers: { 'X-CSRF-TOKEN': token },
            type: tipo,
            dataType: 'json',
            data: parametro,
            beforeSend: function () {
                setErrorShow('Espere mientras atendemos su peticion!', 'blue');
            },
            success: function (response) {
                console.log(response.val);
                switch (response.val) {
                    case '1':
                        // si los datos son correctos
                        // mandar a la pantalla de opciones
                        opcionesIniciales();
                        break;

                    case '0':
                        setErrorShow('Los datos llegaron vacios al servidor!', 'red')
                        break;

                    case '-1':
                        console.log('entro en -1');
                        setErrorShow('El pin que ingresaste es incorrecto!', 'red')
                        break;

                    case '-2':
                        setErrorShow('Su tarjeta ya esta cancelada!', 'blue')
                        break;
                }
            },
            error: function (response) {
                setErrorShow('Ocurrio un error al tratar de conectar con el servidor, intentelo mas tarde!', 'red')
            }
        });// fin ajax
    }// fin get_ajax

    // manejo de errores
    function setErrorShow(err, color) {
        var html = "<p style='color:" + color + ";'>" + err + "</p>";
        $('#errors').html(html);
    }

    // funcion para mostrar las opciones iniciales (primer menu)
    function opcionesIniciales() {
        // cambiando los labels de la izquierda
        
    }

});