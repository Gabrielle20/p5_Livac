class DataHandler {
    /**
     * [constructor description]
     *
     * @constructor
     *
     * @param   {string}    apiSrc  [apiSrc description]
     */
    constructor(apiSrc){
        this.data = null;
        this.user = {
            name     : "",
            firstName:""
        };
        // veloReservation.dataHandler = this;
    }





    setUser(user){
        localStorage.setItem('name', user.name);
        localStorage.setItem('firstName', user.firstName);
    }

    getUserFromLocalStorage(){
        const name      = localStorage.getItem('name');
        const firstName = localStorage.getItem('firstName');
        if ( name !== null ) this.user.name = name;
        if ( firstName !== null ) this.user.firstName = firstName;
        // console.log(name);
        return this.user;
    }

}