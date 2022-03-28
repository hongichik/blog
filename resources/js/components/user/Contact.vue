<template>
    <div v-html="data" class="mt-5 container" style="word-break:break-word;">
    </div>
    
</template>

<script>
export default {
  data () {
    return {
        data:"",
    }
  },
  created (){
      this.showContact()
  },
  methods:{
    async showContact()
    {
        axios.defaults.headers.post['Accept'] = 'application/json'
        await axios.get('/api/ContactShow',{
                headers: {
                Accept: 'application/json'
            }
        })
        .then(data => {
            this.data = data.data;
        })
        .catch(error=>{
            console.log(error);
        })
    },
  }
    
}
</script>