        <div class="text-center" id="containerr2">
        
               
                   <?php $total = 0; ?>
                    
                    @foreach( $arrayProva as $prova )
                        <?php $total= ($prova->numeros)+ $total; ?>  
                        
                    @endforeach

                    <label class="llista2 text-center">{{$total}}</label>
                    
        </div>
     