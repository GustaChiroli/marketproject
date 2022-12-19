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
                                    <v-form v-on:submit.prevent="changeWindow">
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
                                          :type="passType"
                                          append-icon="mdi-eye"
                                          @click:append="changePassVisibility"
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
                                             @click="changeWindow"
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
                                          :rules="emailRules"
                                          autocomplete="false" 
                                          class="mt-10"
                                          required
                                       ></v-text-field>
                                       <v-text-field 
                                          label="Senha" 
                                          v-model="password" 
                                          :rules="passwordRules"
                                          class="mt-10"
                                          :type="passType"
                                          append-icon="mdi-eye"
                                          @click:append="changePassVisibility"
                                          required
                                       ></v-text-field>
                                       <v-text-field 
                                          label="Confirmação de Senha" 
                                          v-model="confirmationPassword" 
                                          :rules="[isPasswordMatch]" 
                                          class="mt-10"
                                          :type="passType"
                                          append-icon="mdi-eye"
                                          @click:append="changePassVisibility"
                                          required
                                       ></v-text-field>
                                       <v-spacer></v-spacer>
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
import UserModel from '../models/UserModel'

   export default {
      data: () => ({
      step: 1,
      valid: false,
      email:'',
      emailRules: [ 
         v => !v || /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/.test(v) || 'Padrão de E-Mail não valido!'
      ],
      password:'',
      passwordRules: [
         v => !!v || 'Password is required',
         v => !v || /\d/.test(v) || 'Password must have number',
         v => v.length > 9 || 'Password must have minimum 9 chars' ,
      ],
      confirmationPassword:'',
      passType:'password',


      }),
      props: {
         source: String
      },
      methods: {
         async register() {
            this.UserModel.email = this.email;
            this.UserModel.password = this.password;

            this.resetChanges();
         },
         login() {
            alert('confirmado');
            this.resetChanges();
         },
         changeWindow() {
            this.resetChanges();
            if(this.step == 1)
            {
               this.step = 2;
            } else
            {
               this.step =1;
            }
         },
         changePassVisibility() {
            this.passType == 'password'? this.passType='text': this.passType='password';
         },
         resetChanges() {
            this.email ='';
            this.password = '';
            this.confirmationPassword = '';
            this.passType = 'password';
         }
      },
      computed: {
         isPasswordMatch() {
            return this.password === this.confirmationPassword || 'Password must match'
         },
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