//анимация на ПОП-АП
let raz_set_foc = document.getElementById('cli') //кнопка
let raz_set_foc_c = document.getElementById('clos')// крестик
    raz_set_foc.addEventListener('click', function() { //нажатие на кнопку (показать)
        document.getElementById('pop').classList.toggle("hd"); //popup
    })
    raz_set_foc_c.addEventListener('click', function() { //нажатие на крестик (скрыть)
        document.getElementById('pop').classList.add("hdi"); //анимация закрытия
        setTimeout(function(){
            document.getElementById('pop').classList.toggle("hd");
            document.getElementById('pop').classList.remove("hdi");
        },400);
    })
 
    //нажатие на фон
    window.onclick = function(event) {    
       if (event.target == document.getElementById('pop')) { //родитель
            document.getElementById('pop').classList.add("hdi"); 
            setTimeout(function(){
                document.getElementById('pop').classList.toggle("hd");    
                document.getElementById('pop').classList.remove("hdi");
            },400);    
        }    
    }


      