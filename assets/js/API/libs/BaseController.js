const URL = "http://192.168.101.8/ospedale/";

/** 
 *  Controlador encargado de enviar peticiones a la base de datos.
 * 
 *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
 */
export class BaseController {

    /**
     *  Crea un nuevo controlador
     * 
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
     */
    constructor() {

    }

    /**
     *  Función encargada de preparar los datos dentro de un FormData
     *  y devuelve un objeto de tipo FormData con los datos incluídos.
     * 
     *  @param {Array<String>} fields - Nombre de los campos
     *  @param {Array<String>} inputs - Valor de los campos
     *  @returns {FormData} Formulario con los datos
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
     */
    prepareForm(fields, inputs) {
        let form = new FormData();

        for (let i = 0; i < fields.length; i++) {
            form.append(fields[i], inputs[i]);
        }

        return form;
    }

    /**
     *  Función encargada de enviar datos a través del método POST
     *  al controlador y devuelve un Promise con los datos.
     * 
     *  @param {String} controller 
     *  @param {String} method 
     *  @param {Array<String>} fields 
     *  @param {Array<String>} inputs 
     *  @returns {Promise<any>}
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
     */
    async sendPost(controller, method, fields, inputs){
        let form = this.prepareForm(fields, inputs);

        let response = await $.ajax({
            url: URL + controller + "/" + method,
            type: "post",
            dataType: "json",
            data: form,
            cache: false,
            contentType: false,
            processData: false
        }).done((r) => {
            if (r != null) {
                return r;
            }
        });

        return response;
    }

    /**
     *  Función encargada de obtener datos según el método objetivo y devuelve una promesa
     *  con dichos datos.
     * 
     *  @param {String} controller 
     *  @param {String} method 
     *  @returns {Promise<any>}
     */
    async getData(controller, method){
        const response = await $.ajax({
            url: URL + controller + "/" + method,
            type: "POST",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false
        }).done((r) => {
            if (r != null){
                return r;
            }
        });

        return response;
    }

}