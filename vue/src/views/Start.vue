<template>
    <div  class="login-container">
        <el-col :xs="24" :sm="24" :md="15" :lg="8" :xl="8" >
            <el-card>
                <span>Frame Based Expert System</span>
                <img src="https://www.desicomments.com/wp-content/uploads/2017/02/Welcome-Pic.jpg" class="image image-size">
                <div>
                    <span>Buying any property - expecially your first - is very exciting,
                            but it is ofthen a little nerve-racking as well. It is
                            important you take the time to do your home work properly.
                            This experty system will assist you in choosing a home
                            to meet your particular requirements.</span>
                    <div class="bottom clearfix">
                        <el-button class="button" @click="$router.push('/query')">Start</el-button>
                    </div>
                </div>
            </el-card>
        </el-col>
    </div>
</template>

<script>
    export default {
        name: "Start"
    }
</script>

<style scoped>
    .login-container {
        align-items: center;
        display: flex;
        justify-content: center;
        margin: 180px auto;
    }
    .image-size {
      height:300px;
      width:500px;
    }
</style>