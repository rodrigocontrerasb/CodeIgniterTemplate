/**
 * Funciones Javascript: functions.js 
 * @description: Controla las acciones del sistema web, requiere jquery
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>  
 * @version 2016-03-03 - Version Inicial
 * @since 2015-03-03
 */

// API Servidor
var API_URL = 'http://localhost/codeigniter/index.php';
//var API_URL = 'http://192.168.1.34/codeigniter/index.php';

// API Servicios
var API_NOTICIAS = API_URL + '/posts/listarposts/2';
var API_FUNCIONARIOS = API_URL + '/posts/listarposts/3';
var API_RESIDENTES = API_URL + '/posts/listarposts/4';
var API_COMUNIDAD = API_URL + '/posts/listarposts/5';
var API_ACERCA = API_URL + '/posts/listarposts/6';


// API Comunidad
var API_COMUNIDADES = API_URL + '/comunidad/listarComunidades';


// Llamados de Funciones -------------------------------------------------------

// Llamados Automaticos
if (idPagina == 'index') {
    getContenidoTab1('#contenido1');

    // Listeners Tabs
    clickTab1('#tab_1', '#contenido1');
    clickTab2('#tab_2', '#contenido2');
    clickTab3('#tab_3', '#contenido3');
    clickTab4('#tab_4', '#contenido4');
    clickTab5('#tab_5', '#contenido5');

    // Listener Laterales
    clickLat1('#lat_1', '#contenido6');

    // Listeners Botones Superiores
    clickBtnRecargar('#btn_recargar');
}

if (idPagina == 'login') {
    getComunidades();
}


// Listeners Tabs --------------------------------------------------------------
function clickTab1(id, container) {
    $(id).click(function () {
        clearTabs();
        getContenidoTab1(container);
    });
}

function clickTab2(id, container) {
    $(id).click(function () {
        clearTabs();
        getContenidoTab2(container);
    });
}

function clickTab3(id, container) {
    $(id).click(function () {
        clearTabs();
        getContenidoTab3(container);
    });
}

function clickTab4(id, container) {
    $(id).click(function () {
        clearTabs();
        getContenidoTab4(container);
    });
}

function clickTab5(id, container) {
    $(id).click(function () {
        clearTabs();
        getContenidoTab5(container);
    });
}

// Listeners Botones -----------------------------------------------------------
function clickBtnRecargar(id) {
    $(id).click(function () {
        clearTabs();
        getContenidoTab1('#contenido1');
        muestraTab('#contenido1');
    });
}

function clickLat1(id, container) {
    $(id).click(function () {
        clearTabs();
        getContenidoLat1(container);
    });
}


// Funciones Generales ---------------------------------------------------------

// Ajusta las imagenes ancho al 100%, y les quita el link
function ajustaImagenesNoticias() {

    $(".collapsible-body img").css("width", '100%');
    $(".collapsible-body img").css("height", '100%');
    $(".collapsible-body img").parent().removeAttr('href');

    // Imagenes
    //$(".collapsible-body img").attr('width','650');
    //$(".collapsible-body img").addClass('materialboxed');
}

function clearTabs() {
    // Clean Tabs
    $('.tabs_central').css('display', 'none');
    // Oculta Lateral
    $('.button-collapse').sideNav('hide');
}

function muestraTab(container) {
    $(container).css('display', 'block');
    $(container).css('opacity', '1');
}

function getMeta(data, key) {
    var salida = '';
    for (var i = 0; i < data.length; i++) {
        meta_key = data[i].meta_key;
        meta_value = data[i].meta_value;
        if (meta_key == key) {
            salida = data[i].meta_value;
        }
    }
    return salida;
}

function setCargando() {
    salida = '';
    salida = salida + '<div class="row" style="margin-top: 100px; text-align: center; margin-bottom: 100px;">';
    salida = salida + '<div class="preloader-wrapper active">';
    salida = salida + '<div class="spinner-layer spinner-red-only">';
    salida = salida + '<div class="circle-clipper left">';
    salida = salida + '<div class="circle"></div>';
    salida = salida + '</div><div class="gap-patch">';
    salida = salida + '<div class="circle"></div>';
    salida = salida + '</div><div class="circle-clipper right">';
    salida = salida + '<div class="circle"></div>';
    salida = salida + '</div></div></div></div>';
    return salida;
}


// Contenidos ------------------------------------------------------------------
function getContenidoLat1(container) {

    // SetCargando
    var cargando = setCargando();
    $(container).html(cargando);

    var URL_SERVICIO = API_NOTICIAS;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        salida = salida + '<ul class="collapsible" data-collapsible="accordion"><li>';
        salida = salida + '<div class="collapsible-header" style="background-color: rgba(238, 110, 115, 0.29);"><span class="title" style="font-weight: bold;"><i class="material-icons" style="display: inline">live_help</i> Ayuda</span></div>';
        salida = salida + '</li>';
        $.each(data, function (key, val) {
            salida = salida + '<li>';
            salida = salida + '<div class="collapsible-header"><i class="material-icons">filter_drama</i><span class="title" style="font-weight: bold;">' + data[key].post_title + '</span></div>';
            salida = salida + '<div class="collapsible-body" style="padding: 20px">' + data[key].post_content + '</div>';
            salida = salida + '</li>';

        });
        salida = salida + '</ul>';

        // Asigna Salida
        $(container).html(salida);

        // Ajusta Imagenes de Noticias
        ajustaImagenesNoticias();

        Materialize.fadeInImage(container);

        // Efecto de transicion
        $('.collapsible').collapsible({accordion: false});

    });
    muestraTab(container);

}

function getContenidoTab1(container) {

    // SetCargando
    var cargando = setCargando();
    $(container).html(cargando);

    var URL_SERVICIO = API_NOTICIAS;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        salida = salida + '<ul class="collapsible" data-collapsible="accordion">';
        $.each(data, function (key, val) {
            var fecha = moment(data[key].post_modified).format('DD/MM/YYYY [a las] hh:mm a');
            salida = salida + '<li>';
            salida = salida + '<div class="collapsible-header"><i class="material-icons">filter_drama</i><div style="margin-left: 42px"><div class="chip" style="float:right; margin-top: 5px;">Por: ' + data[key].display_name + '</div><span class="title" style="font-weight: bold;">' + data[key].post_title + '</span><div style="margin-top: -20px">' + fecha + '</div></div></div>';
            salida = salida + '<div class="collapsible-body" style="padding: 20px">' + data[key].post_content + '</div>';
            salida = salida + '</li>';
        });
        salida = salida + '</ul>';

        //Replace
        salida = salida.replace(/&nbsp;/g, '<br />');

        // Asigna Salida
        $(container).html(salida);

        // Ajusta Imagenes de Noticias
        ajustaImagenesNoticias();

        Materialize.fadeInImage(container);

        // Efecto de transicion
        $('.collapsible').collapsible({accordion: false});

    });
}


function getContenidoTab2(container) {

    // SetCargando
    var cargando = setCargando();
    $(container).html(cargando);

    var URL_SERVICIO = API_FUNCIONARIOS;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        salida = salida + '<div class="row">';
        salida = salida + '<ul class="collection">';

        $.each(data, function (key, val) {
            salida = salida + '<li class="collection-item avatar">';
            salida = salida + '<img src="http://peinadosparahombres.net/wp-content/uploads/2014/08/Peinados-para-Hombres-de-Cara-Larga-5-204x300.jpg" alt="" class="circle">';
            salida = salida + '<span class="title" style="font-weight: bold;">' + data[key].post_title + '</span>';
            salida = salida + '<p><strong>Nombre:</strong> ' + getMeta(data[key].meta, 'nombre') + ' ' + getMeta(data[key].meta, 'apellido') + ' <br><strong>Email:</strong> <a href="mailto:' + getMeta(data[key].meta, 'email') + '">' + getMeta(data[key].meta, 'email') + '</a></p>';
            salida = salida + '<p><strong>Cargo:</strong> ' + getMeta(data[key].meta, 'cargo') + ' <br><strong>Detalle:</strong> ' + getMeta(data[key].meta, 'detalle') + '</p>';
            salida = salida + '<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>';
            salida = salida + '</li>';
        });
        salida = salida + '</ul>';
        salida = salida + '</div>';

        $(container).html(salida);
        Materialize.fadeInImage(container);
    });
}


function getContenidoTab3(container) {

    // SetCargando
    var cargando = setCargando();
    $(container).html(cargando);

    var URL_SERVICIO = API_RESIDENTES;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        salida = salida + '<div class="row">';
        salida = salida + '<ul class="collection">';

        $.each(data, function (key, val) {
            salida = salida + '<li class="collection-item avatar">';
            salida = salida + '<img src="http://peinadosparahombres.net/wp-content/uploads/2014/08/Peinados-para-Hombres-de-Cara-Larga-5-204x300.jpg" alt="" class="circle">';
            salida = salida + '<span class="title" style="font-weight: bold;">' + data[key].post_title + '</span>';
            salida = salida + '<p><strong>Nombre:</strong> ' + getMeta(data[key].meta, 'nombre') + ' ' + getMeta(data[key].meta, 'apellido') + ' <br><strong>Email:</strong> <a href="mailto:' + getMeta(data[key].meta, 'email') + '">' + getMeta(data[key].meta, 'email') + '</a></p>';
            salida = salida + '<p><strong>Cargo:</strong> ' + getMeta(data[key].meta, 'cargo') + ' <br><strong>Detalle:</strong> ' + getMeta(data[key].meta, 'detalle') + '</p>';
            salida = salida + '<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>';
            salida = salida + '</li>';
        });
        salida = salida + '</ul>';
        salida = salida + '</div>';

        $(container).html(salida);
        Materialize.fadeInImage(container);
    });
}

function getContenidoTab4(container) {

    // SetCargando
    var cargando = setCargando();
    $(container).html(cargando);

    var URL_SERVICIO = API_COMUNIDAD;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        salida = salida + '<div class="row">';
        salida = salida + '<ul class="collection">';

        $.each(data, function (key, val) {
            salida = salida + '<li class="collection-item avatar">';
            salida = salida + '<img src="http://publicdomainvectors.org/photos/buildings2-icon-64x64.png" alt="" class="circle">';
            salida = salida + '<span class="title" style="font-weight: bold;">' + data[key].post_title + '</span>';
            salida = salida + '<p><strong>Nombre:</strong> ' + getMeta(data[key].meta, 'nombre') + ' ' + getMeta(data[key].meta, 'apellido') + ' <br><strong>Dirección: </strong>' + getMeta(data[key].meta, 'direccion') + '</p>';
            salida = salida + '<p><strong>Email:</strong> ' + getMeta(data[key].meta, 'email') + '<br><strong>Fono Fijo: </strong>' + getMeta(data[key].meta, 'fono_fijo') + '</p>';
            salida = salida + '<p><strong>Fono Móvil:</strong> ' + getMeta(data[key].meta, 'fono_movil') + '</p>';
            salida = salida + '</li>';
            salida = salida + '<li class="collection-item avatar" style="padding: 0px;">';
            salida = salida + '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13377.770347705158!2d-71.605634!3d-33.044813!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf4c8e2e227c78deb!2sCasa+Central+PUCV!5e0!3m2!1ses!2sus!4v1428604743469" width="100%" height="450" frameborder="0" style="border:0"></iframe>';
            salida = salida + '</li>';
        });
        salida = salida + '</ul>';
        salida = salida + '</div>';

        $(container).html(salida);
        Materialize.fadeInImage(container);
    });
}

function getContenidoTab5(container) {

    // SetCargando
    var cargando = setCargando();
    $(container).html(cargando);

    var URL_SERVICIO = API_ACERCA;

    $.getJSON(URL_SERVICIO, function (data) {
        salida = "";
        salida = salida + '<div class="row">';
        salida = salida + '<ul class="collection">';

        $.each(data, function (key, val) {
            salida = salida + '<li class="collection-item avatar">';
            salida = salida + '<img src="http://publicdomainvectors.org/photos/buildings2-icon-64x64.png" alt="" class="circle">';
            salida = salida + '<span class="title" style="font-weight: bold;">' + data[key].post_title + '</span>';
            salida = salida + '<p><strong>Nombre:</strong> ' + getMeta(data[key].meta, 'nombre') + ' ' + getMeta(data[key].meta, 'apellido') + ' <br><strong>Dirección: </strong>' + getMeta(data[key].meta, 'direccion') + '</p>';
            salida = salida + '<p><strong>Email:</strong> ' + getMeta(data[key].meta, 'email') + '<br><strong>Fono Fijo: </strong>' + getMeta(data[key].meta, 'fono_fijo') + '</p>';
            salida = salida + '<p><strong>Fono Móvil:</strong> ' + getMeta(data[key].meta, 'fono_movil') + '</p>';
            salida = salida + '</li>';
        });
        salida = salida + '</ul>';
        salida = salida + '</div>';

        $(container).html(salida);
        Materialize.fadeInImage(container);
    });
}


function getComunidades() {

    var URL_SERVICIO = API_COMUNIDADES;
    $.getJSON(URL_SERVICIO, function (data) {

        salida = "";
        salida = salida + '<option value="" disabled selected>-- Seleccione Comunidad</option>';
        $.each(data, function (key, val) {
            salida = salida + '<option value="' + data[key].id + '">' + data[key].nombre + '</option>';
        });

        // Salida & Despliegue
        $('#l_comunidades').html(salida);
        $('select').material_select();
    });
}