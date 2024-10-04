/*ESTILOS PARA TABS -IMPORTANTE-*/
.tabs {
      display: flex;
   }

   .tab {
      background-color: #41bfb7;
      color: white;
      border: 1px solid white;
      border-radius: 10px;
      padding: 10px;
      cursor: pointer;
		 padding-left: 2em;
		 padding-right: 2em;
      margin-right: 10px; /* Adjust the margin between tabs as needed */
   }

   .active-tab {
      background-color: #0d1e25; /* Cambiar a tu color deseado para la pestaña activa */
   }

   .container-tab {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
   }

   .tab:hover {
      background-color: #0d1e25;
      color: white;
   }

   .tab-content {
      display: none;
   }

   .active-tab-content {
      display: block;
   }

@media (max-width: 768px) {
	
	.tabs {
    flex-direction: column; 
		text-align: center;
}

	
	.toggle-container .toggle-header {  
  font-size: 0.9rem!important;
		padding-right: 10%;
}
}


/*FIN ESTILOS TABS*/