function bienvenidos() {
    axios.get('https://api.trello.com/1/boards/615e121e55742a5a6ba346bc/cards?key=8b326737f43e5a629e80b9c95b0a6016&token=fcd44ca66295583ff083eb88f93ef882c4836355b6edce681b2b9fc631c15517')
    .then(res =>{
        //Utilizo una expresión regular para mostrar el saludo de bienvenidos.
        var mensaje = res.data[0].name.replace(/\d+/g,'');
        $('#welcome').html(mensaje);
        $('#saludo').html(mensaje);
    }).catch(error=>{
        console.error(error.response.status);
    })
}

bienvenidos(); 
