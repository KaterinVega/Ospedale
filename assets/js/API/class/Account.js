import { BaseController } from "../libs/BaseController.js";

/**
 *  Modelo encargado de hacer peticiones a la tabla Account de la base de datos
 * 
 *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
 */
export class Account extends BaseController {

    /**
     *  Crea un nuevo objeto de la clase Account con los datos respectivos
     * 
     *  @param {String} email - Correo electrónico de la cuenta
     *  @param {String} passwprd - Contraseña de la cuenta
     *  @param {String} role - Role de la cuenta
     */
    constructor(email, password, role, documento) {
        super();
        
        this.email = email;
        this.password = password;
        this.role = role;
        this.documento = documento;
    }

    /**
     *  Función que se encarga de utilizar el método add del controlador para
     *  añadir una nueva cuenta a la base de datos.
     * 
     *  @returns {Promise<Account>} 
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
     */
    async add() {
        const promise = await this.sendPost("API", "signUp", ["account"], [JSON.stringify(this)]).then((r) => r);

        return promise;
    }

    /**
     *  Función que se encarga de utilizar el método exists del controlador para
     *  verificar la existencia de la cuenta en la base de datos.
     * 
     *  @returns {Promise<Account>}
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com> 
     */
    async exists(){
        const promise = await this.sendPost("API", "signIn", ["account"], [JSON.stringify(this)]).then((r) => r);

        return promise;
    }

    /**
     *  Función que se encarga de utilizar el método update del controlador para
     *  actualizar los datos de la cuenta en la base de datos.
     * 
     *  @returns {Promise<Account>}
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com> 
     */
    async update(){
        const promise = await this.sendPost("API", "update", ["account"], [JSON.stringify(this)]).then((r) => r);
        
        return promise;
    }

    /**
     *  Función que se encarga de utilizar el método delete del controlador para
     *  eliminar una cuenta registrada en la base de datos.
     * 
     *  @returns {Promise<Account>}
     *  @author Jose Luis Salinas <joseluissalinas2001@gmail.com>
     */
    async delete(){
        const promise = await this.sendPost("API", "delete", ["account"], [JSON.stringify(this)]).then((r) => r);

        return promise;
    }

}