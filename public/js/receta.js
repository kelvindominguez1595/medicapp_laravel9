$(document).ready(function () {
    $("#btn-agregar").on("click", function () {
        // tabla
        let producto_id = $("#producto_id").val();
        let producto_text = $(
            "select[name='producto_id'] option:selected"
        ).text();

        let cantidad_producto = $("#cantidad_producto").val();
        let cantida_por_dia = $("#cantida_por_dia").val();
        let otra_indicacion = $("#otra_indicacion").val();
        let table = $("#table-canasta");
        if (
            producto_id !== "" &&
            cantidad_producto !== "" &&
            cantida_por_dia !== "" &&
            otra_indicacion !== ""
        ) {
            let html = "<tr>";
            let precioGet = producto_text.split(" ");
            let showPrice = precioGet[precioGet.length - 1];
            let parsePrice = parseFloat(showPrice.replace("$", ""));
            let subtoal = cantidad_producto * parsePrice;
            html += "<td>" + producto_text.split(" ")[0] + "</td>";
            html += "<td>" + showPrice + "</td>";
            html += "<td>" + cantidad_producto;
            html +=
                '<input type="hidden" name="cantidad[]" value="' +
                cantidad_producto +
                '" />';
            html +=
                '<input type="hidden" name="producto_idsend[]" value="' +
                producto_id +
                '" />';
            html += "</td>";

            html += "<td>" + cantida_por_dia;
            html +=
                '<input type="hidden" name="cantidapordia[]" value="' +
                cantida_por_dia +
                '" />';
            html += "</td>";

            html += "<td>";
            html +=
                '<textarea required name="comentario" id="comentario" class="form-control">';
            html += otra_indicacion;
            html += "</textarea>";
            html += "</td>";

            html += "<td>$";
            html += "<span class='subtotal'>" + subtoal.toFixed(2);
            +"</span>";
            html +=
                '<input type="hidden" name="subtotal[]" value="' +
                subtoal.toFixed(2) +
                '" />';
            html += "</td>";

            html +=
                '<td class="text-center"><button id="quitar" type="button" class="btn btn-danger quitar">Borrar</button></td>';

            html += "</tr>";
            table.append(html);
            sumtotalfinal();
        } else {
            alert("Todos los campos son obligatorios");
        }
    });
});

$(document).on("click", "#quitar", function () {
    $(this).closest("tr").remove();
    sumtotalfinal();
});

function sumtotalfinal() {
    let total = 0;
    $(".subtotal").each(function () {
        total += Number($(this).text().replace(/[$]/g, ""));
    });
    let da = "$" + total.toFixed(2);
    $("#totalfinal").text(da);
}
