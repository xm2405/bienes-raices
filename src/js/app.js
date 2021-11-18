document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();
})

function darkMode(){
    const prefermode = window.matchMedia('(prefers-color-scheme: dark)');
    //console.log(prefermode.matches);
    if(prefermode.matches){
        document.body.classList.add('dark-mode');
    }else{
      document.body.classList.remove('dark-mode');  
    }
    prefermode.addEventListener('change', function(){
        if(prefermode.matches){
        document.body.classList.add('dark-mode');
    }else{
      document.body.classList.remove('dark-mode');  
    }
    });

    const dk = document.querySelector('.dark-mode');
    dk.addEventListener('click', function(){
       document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMEnu = document.querySelector('.mobile-menu');
    mobileMEnu.addEventListener('click', navResponsive);
}

function navResponsive(){
    const nav = document.querySelector('.navegacion');
    if(nav.classList.contains('mostrar')){
        nav.classList.remove('mostrar');
    }else{
        nav.classList.add('mostrar');
    }
}