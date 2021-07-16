let show_copy = () => {
    var year = new Date().getFullYear()
    var htmlString = "&copy; " + year + " Copyright <strong><span>Peluches Alfa</span></strong>. Todos los derechos reservados.";
        $("#copy").html( htmlString );
}