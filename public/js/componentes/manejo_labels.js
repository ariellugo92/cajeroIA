$(document).ready(function () {

    // inicializando variables
    var flagCordoba = false;
    var flagDolar = false;
    var flagPin = false
    var arrayPin = [];
    var arrayRetiro = [];
    var flagRetiro = false;

    // capturando el evento de los botones
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

    // funcion al presionar un boton
    function pressBoton(num) {
        // si lo que se esta ingresando es el pin
        if (!flagPin && !flagRetiro) {
            if (arrayPin.length < 4) {
                arrayPin.push(num);
                getValueArray(arrayPin);
            }
        }

        if (!flagPin && flagRetiro) {
            arrayRetiro.push(num);
            getValueArray(arrayRetiro);
        }
    }

    // funcion para obtener los valores del arrayPin
    function getValueArray(arr) {
        var value = "";
        for (var index = 0; index < arr.length; index++) {
            var element = arr[index];

            value += element;
        }

        $('#pantallaPin').val(value);
    }

    // funcion para poner los botones enable
    function deleteNum(flag) {
        arrayPin.pop();
        getValueArray(arrayPin);
    }

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

            case 'cancelar':
                borrarPantalla();
                break;

            case 'retiro':
                opcionesTipoMoneda();
                break;

            case 'cordoba':
                flagCordoba = true;
                flagRetiro = true;
                pnlNumCantidad();
                break;

            case 'dolar':
                flagDolar = false;
                flagRetiro = true;
                pnlNumCantidad();
                break;

            case 'retirar':
                initRetiro();
                break;

            default:
                break;
        }
    }

    // funcion para ingresar dsps de ingresar el pin
    function validarPin() {
        var pinValue = $('#pantallaPin').val();
        if (pinValue.length < 4) {
            setErrorShow('El PIN debe de contener 4 digitos', 'red');
            return;
        }

        // validando por ajax si el pin es correcto
        var ruta = 'retiros/';
        var dato = pinValue;
        var parametro = {
            param: dato
        };
        get_ajax(ruta, parametro, 'get');
    }

    // metodo para enviar el ajax
    function get_ajax(ruta, dato, tipo) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: ruta,
            headers: { 'X-CSRF-TOKEN': token },
            type: tipo,
            dataType: 'json',
            data: dato,
            beforeSend: function () {
                setErrorShow('Espere mientras atendemos su peticion!', 'blue');
            },
            success: function (response) {
                console.log(response.val);
                switch (response.val) {
                    case '1':
                        // si los datos son correctos
                        // mandar a la pantalla de opciones
                        if(!flagPin && !flagRetiro){
                            // si se ingreso bien el pin
                            opcionesIniciales();
                        }

                        if(flagRetiro){
                            // si se registro bien el retiro

                        }
                        break;

                    case '0':
                        setErrorShow('Los datos llegaron vacios al servidor!', 'red')
                        break;

                    case '-1':
                        if(!flagPin && !flagRetiro){
                            // si el pin es incorrecto
                            setErrorShow('El pin que ingresaste es incorrecto!', 'red');
                        }

                        if(flagRetiro){
                            // si el retiro fallo
                            
                        }
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
        $('#lbl1_der').text('Ver Saldo');
        $('#lbl2_der').text('Abono');
        $('#lbl3_der').text('Retiro');
        $('#lbl4_der').text('Item 2');
        // cambiando los labels de la derecha
        $('#lbl1_izq').text('Ver Mas');
        $('#lbl2_izq').text('Adelanto');
        $('#lbl3_izq').text('Reportar');
        $('#lbl4_izq').text('Salir');
        // cambiando el mensaje de error
        setErrorShow('', '');
        // cambiando el contenido del centro
        $('#txtMensaje').text('Seleccione Una Opcion');
        borrarPantalla();
        emptyArrayPin();
        $('#pantallaPin').fadeOut();
        $('#pnlNumerico').fadeOut();
    }

    // funcio para mostrar el menu de elegir el tipo de moneda
    function opcionesTipoMoneda() {
        // cambiando los labels de la izquierda
        $('#lbl1_der').text('');
        $('#lbl2_der').text('');
        $('#lbl3_der').text('');
        $('#lbl4_der').text('Cordoba');
        // cambiando los labels de la derecha
        $('#lbl1_izq').text('');
        $('#lbl2_izq').text('');
        $('#lbl3_izq').text('Regresar');
        $('#lbl4_izq').text('Dolar');
        // cambiando el contenido del centro
        $('#txtMensaje').text('Seleccione el Tipo de Moneda');
    }

    // funcion para que ingrese la cantidad a retirar
    function pnlNumCantidad() {
        // cambiando los labels de la izquierda
        $('#lbl1_der').text('');
        $('#lbl2_der').text('');
        $('#lbl3_der').text('');
        $('#lbl4_der').text('Retirar');
        // cambiando los labels de la derecha
        $('#lbl1_izq').text('');
        $('#lbl2_izq').text('');
        $('#lbl3_izq').text('');
        $('#lbl4_izq').text('Regresar');
        // cambiando el contenido del centro
        $('#txtMensaje').text('Ingrese la cantidad a retirar');
        $('#pantallaPin').fadeIn();
        $('#pnlNumerico').fadeIn();
    }

    // iniciando el retiro del dinero
    function initRetiro(){
        // validando que la cantidad no sea 0
        var cantidad = $('#pantallaPin').val();
        if(cantidad == '0'){
            setErrorShow('La cantidad a retirar tiene que ser mayor a 0', 'red');
            return;
        }

        var ruta = 'retiros/retirar';
        var tipoModena = flagCordoba ? 'cardoba' : 'dolar';
        var cantRetiro = $('#pantallaPin').val();
        var parametro = {
            tipo : tipoModena,
            cant : cantRetiro
        }

        get_ajax(ruta, parametro, 'post');
    }

    // opciones para borrar la pantalla
    function borrarPantalla() {
        $('#pantallaPin').val('0');
    }

    // borrando arrayPin
    function emptyArrayPin() {
        while (arrayPin.length) {
            arrayPin.pop();
        }
    }

});