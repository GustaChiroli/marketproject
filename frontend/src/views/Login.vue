<template>
    <container fluid style="height: 100vh" class="d-flex fill-height">
      <v-row class="d-flex justify-center align-center">
         <v-col cols="12" sm="10">
            <v-card class="elevation-6 mt10">
               <v-window v-model="step">
                  <v-window-item :value="1">
                     <v-row>
                        <v-col cols="6" sm="6" class="leftsidebgcolor">
                           <v-card-text class="my-12">
                              <h1 class="text-center mb-7">Login</h1>
                              <v-row class="d-flex justify-center align-center">
                                 <v-col cols="12" sm="8">
                                    <v-form v-on:submit.prevent="changewindow">
                                       <v-text-field 
                                          v-model="email" 
                                          :rules="emailRules"
                                          label="Email" 
                                          autocomplete="false" 
                                          class="mt-10"
                                          required
                                       ></v-text-field>
                                       <v-text-field 
                                          v-model="password" 
                                          label="Senha" 
                                          autocomplete="false" 
                                          class="mt-10"
                                          :type="passtype"
                                          append-icon="mdi-eye"
                                          @click:append="changepassvisibility"
                                          required
                                       ></v-text-field>
                                       <v-card-actions>
                                          <v-icon
                                             large
                                             @click="passvisibility"
                                          >
                                             mdi-visibility
                                          </v-icon>
                                       </v-card-actions>
                                       <v-row class="justify-center align-center mt-6">
                                          <v-btn
                                             color="success"
                                             @click="login"
                                          >
                                             Logar
                                          </v-btn>
                                          <span
                                             @click="changewindow"
                                             class="ml-10 registerspan"
                                          >
                                             Faça agora o seu cadastro
                                          </span>
                                       </v-row>
                                       
                                    </v-form>
                                 </v-col>
                              </v-row>
                           </v-card-text>
                        </v-col>
                        <v-col cols="6" sm="6" class="rightsidebgcolor">
                           <v-card-title class="my-12 d-flex flex-wrap justify-center align-center">
                              <h1 class="textcolorwhite">
                                 Seja Bem Vindo
                              </h1>
                              
                           </v-card-title>
                           <v-divider class="mt-8"></v-divider>
                           <v-card-subtitle class="mt-12 d-flex flex-wrap justify-center align-center">
                              <h3 class="textcolorwhite">
                                 Faça seu login ao lado
                              </h3>
                              <h3 class="mt-3 textcolorwhite">
                                 e venha descobrir a melhor forma de gerir seu negócio
                              </h3>
                           </v-card-subtitle>
                        </v-col>
                     </v-row>
                  </v-window-item>
                  <v-window-item :value="2">
                     <v-row>
                        
                        <v-col cols="6" sm="6" class="rightsidebgcolor">
                           <v-card-title class="my-12 d-flex flex-wrap justify-center align-center">
                              <h1 class="textcolorwhite">
                                 Seja Bem Vindo
                              </h1>
                              
                           </v-card-title>
                           <v-divider class="mt-8"></v-divider>
                           <v-card-subtitle class="mt-12 d-flex flex-wrap justify-center align-center">
                              <h3 class="textcolorwhite">
                                 Cadastre-se ao lado
                              </h3>
                              <h3 class="mt-3 textcolorwhite">
                                 e venha descobrir a melhor forma de gerir seu negócio
                              </h3>
                           </v-card-subtitle>
                        </v-col>
                        <v-col cols="6" sm="6" class="leftsidebgcolor">
                           <v-card-text class="my-12">
                              <h1 class="text-center mb-7">Cadastro</h1>
                              <v-row class="d-flex justify-center align-center">
                                 <v-col cols="12" sm="8">
                                    <v-form>
                                       <v-text-field 
                                          v-model="email" 
                                          label="Email" 
                                          autocomplete="false" 
                                          class="mt-10"
                                          required
                                       ></v-text-field>
                                       <v-text-field 
                                          v-model="password" 
                                          label="Senha" 
                                          autocomplete="false" 
                                          class="mt-10"
                                          :type="passtype"
                                          append-icon="mdi-eye"
                                          @click:append="changepassvisibility"
                                          required
                                       ></v-text-field>
                                       <v-text-field 
                                          v-model="confirmpassword" 
                                          label="Confirmação de Senha" 
                                          autocomplete="false" 
                                          class="mt-10"
                                          :type="passtype"
                                          append-icon="mdi-eye"
                                          @click:append="changepassvisibility"
                                          required
                                       ></v-text-field>
                                       <v-btn
                                          color="sucess"
                                          @click="register"
                                          class="mt-8"
                                       >
                                          Cadastrar
                                       </v-btn>
                                    </v-form>
                                 </v-col>
                              </v-row>
                           </v-card-text>
                        </v-col>
                     </v-row>
                  </v-window-item>
               </v-window>
            </v-card>
         </v-col>
      </v-row>
   </container>
</template>

<script>

   export default {
      data: () => ({
      step: 1,
      valid: false,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters'
      ],
      email:'',
      emailRules: [ 
        v => !v || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'Padrão de E-Mail não valido!'
      ],
      password:'',
      passtype:'password',


      }),
      props: {
         source: String
      },
      methods: {
         login() {
            alert('confirmado');
         },
         changewindow() {
            this.resetchanges();
            if(this.step == 1)
            {
               this.step = 2;
            } else
            {
               this.step =1;
            }
         },
         changepassvisibility() {
            this.passtype == 'password'? this.passtype='text': this.passtype='password';
         },
         resetchanges() {
            this.email ='';
            this.name = '';
            this.password = '';
            this.passtype = 'password';
         }
      } 
      
   }
   
</script>

<style>
.v-application .rounded-bl-xl {
    border-bottom-left-radius: 300px !important;
}
.v-application .rounded-br-xl {
    border-bottom-right-radius: 300px !important;
}
.rightsidebgcolor {
   background-color:#0184DE;

}
.leftsidebgcolor {
   background-color: aliceblue;
}
.textcolorwhite {
   color:#FFFFFF;
}
.registerspan {
   font-size: 15px;
   color:#0184DE;
}
</style>