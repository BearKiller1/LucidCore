export default class Index {

    constructor() {
        if( this.checkPage() ) {
            this.view = window.localStorage.getItem('view');
        }
        else{
            this.view = 'welcome';
        }
        this.Init();
    }

    Init = () => {
        $.ajax({
            url: "backend/controllers/welcome/welcome.class.php",
            data: {
                action: 'getData',
                page: this.view
            },
            success: function (response) {
                console.log('index.js');
            }
        });
    }

    checkPage = () => {
        var view = window.localStorage.getItem('view');
        
        if(view == undefined) {
            return false;
        } else if (view == null) {
            return false;
        } else if(view == '') {
            return false;
        } else{
            return true;
        }
    }

}

new Index();