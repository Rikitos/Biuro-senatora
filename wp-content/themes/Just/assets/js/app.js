console.log('test1');
class HeaderMenu {
  constructor() {
    this.menuContainer = document.querySelector('.header__navigation');
    // this.menuGroup = document.querySelector('.header__navigation__container');
    this.socialContainer = document.querySelector('.header__container__socials');
    this.isIndex = false;
    this.hamburgers = document.querySelectorAll('.hamburger');
    this.hamburgersContainer = document.querySelector('.header__hamburger');
    this.navigationContainer = document.querySelector('.header__navigation__container-list');
    this.navigation = document.querySelectorAll('.header__navigation__container-list>li');


    if (this.hamburgers) {
      this.hamburgers.forEach(hamburger => {
        this.hamburgersContainer.addEventListener('click', (e) => {
          hamburger.classList.toggle('open');
          // this.hamburgers.forEach( e => {
          //   e.classList.toggle('open');
          // })
          this.showMenu();
        })
      })
    }
    if (this.navigation) {
      this.navigation.forEach(nav => {
        nav.addEventListener('click', (e) => {
          this.hamburgers.forEach(hamburger => {
            hamburger.classList.toggle('open');
          })
          this.showMenu();
        })
      })
    }
    // this.navigationList.addEventListener('click', (e) => {
    //   this.hamburgers.forEach(hamburger => {
    //     hamburger.classList.toggle('open');
    //   })
    //   this.showMenu();
    // })
  }

  showMenu() {
    if (this.isIndex) {
        this.isIndex = !this.isIndex;
        document.body.style = "";
    } else {
      this.isIndex = !this.isIndex;
      document.body.style = "overflow-y: hidden";
    }
    this.menuContainer.classList.toggle('menu-opened');
    this.socialContainer.classList.toggle('menu-opened');
  }
}


document.addEventListener('DOMContentLoaded', () => {
  new HeaderMenu();
});