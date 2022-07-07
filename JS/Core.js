           //FUNCIONES PARA VALIDAR
//VALIDACIÓN PARA CUANDO SE LEVANTA UNA TECLA o SE PRESIANA FUERA DEL CAMPO
const validaFormulario= (e) => {
    switch(e.target.name){
        case 'usuario':
            
            console.log('pasó por aqui');
            console.log(e.target.value);
            ValidaCampo(expresiones.usuario, e.target,'usuario');

            break
        case 'password':
            console.log('pasó por aqui');
            console.log(e.target.value);
            ValidaCampo(expresiones.password, e.target,'password');
            break
    }
}

const ValidaCampo = (expresion, input,campo) =>{
    if(expresion.test(input.value)){
        console.log(expresion.test(input.value));
        document.getElementById(`grupo__${campo}`).classList.remove('Formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('Formulario__grupo-correcto');
        //Para poner icono de exito (verde) si es correcto
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        
        campos[campo]=true;
        
    }else{
        console.log(expresion.test(input.value));
        document.getElementById(`grupo__${campo}`).classList.add('Formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('Formulario__grupo-correcto');
        //Para poner icono de error (rojo) si no es correcto lo que ingresa
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        
        campos[campo]=false;        
    }
    PresentarEstadoFormulario();//Para presentar si mensajes de error o correcto
    
}

const PresentarEstadoFormulario = () => {
    if(campos.usuario && campos.password){ //si los dos campos estan en true
        //Poner mensaje de exito (verde) si es correcto
        document.querySelector('#Mensaje p').classList.add('Formulario__mensaje-exito-activo');
        document.querySelector('#Mensaje2 p').classList.remove('Formulario__mensaje-error-activo');
        // Activo el boton boton
         boton.disabled = false;
         document.querySelector('#Boton-Login').classList.remove('Disabled')
    }else{
        //Poner mensaje de error (rojo) si no es correcto
        document.querySelector('#Mensaje p').classList.remove('Formulario__mensaje-exito-activo');
        document.querySelector('#Mensaje2 p').classList.add('Formulario__mensaje-error-activo'); // Activo el boton boton
        //Desactivo el boton
         boton.disabled =true;
         document.querySelector('#Boton-Login').classList.add('Disabled')
    }
    
}
//Para definir el estado del campo (válido o incorrecto)
const campos = {
    usuario: false,
    password: false
}

//Expresione que serviran para validar los campos(son patrones)
const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,15}$/, 
	password: /^[a-zA-z0-9\_\-]{4,15}$/, // Letras, numeros, guion y guion_bajo
}

//Obtencion los datos del formulario del html
const Formulario = document.getElementById('Formulario');
const input_s= document.querySelectorAll('#Formulario input');

//Comienzo de la validacion 
input_s.forEach((input) => {
    input.addEventListener('keyup', validaFormulario);//Ejecutar la validacion si se levanta una tecla
    input.addEventListener('blur', validaFormulario);//Ejecutar la validacion si se da click fuera de un campo
});

Formulario.addEventListener('submit', (e)=>{
    //e.preventDefault();  
    //alert('se ha presionado el boton');
});
 let boton = document.getElementById('Boton-Login');
boton.disabled =true;



     

