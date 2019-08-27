
$(document).ready(function () {
    $("#userfile").on('change', function () {
     var s=   document.getElementById('userfile');
        alert(s.value);
        var curso = $(this).val();
      //  substr($estudiante->email,strlen($estudiante->email)-3)
        alert(curso);
        switch (curso) {
            case "Paginas web basico":
                alert("El curso elegido tien un valor de Q 50");
                break;
            case "Paginas web intermedio":
                alert("El curso elegido tien un valor de Q 125");
                break;

            case "Paginas web avanzado":
                alert("El curso elegido tien un valor de Q 200");
                break;
        }
    });
});