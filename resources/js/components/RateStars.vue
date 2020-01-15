<template>
    <div class="row">
        <div class="h3 col-12 d-flex">
            <div class="mr-2" @click="function(){}" v-text="rate"></div>
            <i id="star1" @click="changeRate(1)" @mouseleave="starCount()" @mouseenter="hover(1)" class="icon-star-empty ml-1"></i>
            <i id="star2" @click="changeRate(2)" @mouseleave="starCount()" @mouseenter="hover(2)" class="icon-star-empty ml-1"></i>
            <i id="star3" @click="changeRate(3)" @mouseleave="starCount()" @mouseenter="hover(3)" class="icon-star-empty ml-1"></i>
            <i id="star4" @click="changeRate(4)" @mouseleave="starCount()" @mouseenter="hover(4)" class="icon-star-empty ml-1"></i>
            <i id="star5" @click="changeRate(5)" @mouseleave="starCount()" @mouseenter="hover(5)" class="icon-star-empty ml-1"></i>
        </div>
        <div class="col-11">rate's: <span @click="function(){}" v-text="ratecount"></span></div>
    </div>
</template>

<script>
    function set(prop){
        for(let i=1; i<=prop; i++)
        {
            let name = "star" + i;
            let element = document.getElementById(name);
            element.className="icon-star ml-1";
        }

        for(let i=5; i>prop; i--)
        {
            let name = "star" + i;
            let element = document.getElementById(name);
            element.className="icon-star-empty ml-1";
        }
    }
    export default {
        props:['rate', 'ratecount' , 'actualy', 'productid'],

        mounted() {
            console.log('Component mounted.')
            set(this.status)
        },

        data: function(){
            return {
                status: this.actualy,
            }
        },

        methods:{
            hover(id){
                set(id);
            },

            starCount(){
                set(this.status)
            },

            changeRate(prop){
                axios.post('/rate/' + this.productid + "/" + prop)
                    .then(response => {
                        this.status = response.data;
                        set(this.status)
                    })
                    .catch(errors => {
                        if (errors.response.status == 401){
                            window.location = '/login'
                        }
                    })
            }
        }
    }
</script>
