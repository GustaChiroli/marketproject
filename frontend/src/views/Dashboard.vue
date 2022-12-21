<template>
	<v-container fluid style="height: 100vh" class="d-flex fill-height">
		<v-row class="d-flex justify-center align-start">
			<v-col cols="12" sm="10">
        		<v-card class="elevation-6 mt10">
					<v-row>
						<v-col cols="6">
							<v-btn class="btn-principal" :to="{ name: 'sales' }">Vendas</v-btn>
						</v-col>
						<v-col cols="6">
							<v-btn class="btn-principal" :to="{ name: 'stock' }">Estoque</v-btn>
						</v-col>
					</v-row>
				</v-card>
				<v-card class="mt-5">
					<v-row>
						<v-col cols="12">
							<div class="title d-flex justify-center">
								<h1>Dados sobre seu negócio</h1>
							</div>
							<v-divider></v-divider>
							<div class="cards d-flex justify-space-around">
								<div class="card">futuro grafico</div>
								<div class="card">futuro grafico</div>
								<div class="card">futuro grafico</div>
								<div class="card">futuro grafico</div>
								<div class="card">futuro grafico</div>
							</div>
						</v-col>
					</v-row>
				</v-card>
      		</v-col>
		</v-row>
	</v-container>
</template>

<style scopped>
.btn-principal{
	height: 10vh !important;
	width: 100% !important;
}
.cards {
	flex-wrap: wrap;

}
.card {
	height: 250px;
	width: 250px;
	border-radius: 5px;
	background-color: blue ;
	margin-top: 15px;
}
</style>