const swup = new Swup();


const menuBar = document.querySelector('.menuBar') //check 
const dropDown = document.querySelector('.dropDown') //check signIn.php and signUp,php
const sideToggler = document.querySelector('.sideToggler') //side tggler, check income,expense,and transaction.php
const mobileToggler = document.querySelector('.sideTogglerMobile') //mobile side-menu toggler,check income,expense,and transaction.php
const mobileMenu= document.querySelector('.mobile') //mobile side-menu,check income,expense,and transaction.php
const container = document.querySelector('.container-m') //check income,expense,and transaction.php
const sideMenu = document.querySelector('.side-menu')
const sideTogglerCanceler = document.querySelector('.sideTogglerCanceler') //check income,expense and transaction.php

sideToggler.addEventListener('click', function() {
    //logic to toggle the side menu 
    if(sideMenu.style.transform !== 'translateX(-15.3vw)')  { sideMenu.style.transform ='translateX(-15.3vw)'}
    else{
        sideMenu.style.transform = 'initial'
    }
    
})

   //logic to remove the mobile-side-menu
sideTogglerCanceler.addEventListener('click', function() {
    mobileMenu.style.transform = 'translateX(-240px)'
  

    
})

   //logic to toggle the mobile side menu 
mobileToggler.addEventListener('click', function() {
  
    mobileMenu.style.transform = 'translateX(0px)'
    
   

   
   
})

   //logic to toggle the dropdown class in the sign in and sign up pages
menuBar.addEventListener('click', function() {
if(dropDown.style.overflow === 'hidden') {
  
dropDown.style.height = '65px'
dropDown.style.overflow = 'visible'
}
else {
dropDown.style.height = '0%'
dropDown.style.overflow = 'hidden'
}
})





