<?php
/**
 * Converts any set of two arrays of any size to
 * an orthonormal set using the Gram-Schidmt Process
 * @class GramSchmidt
 * @author Ariane Jamie 
 * @datecreated Spring 2012
 */

class GramSchmidt{
  
    //Public Methods

    /**
    * Convert basis to an orthogonal basis.
    * @method getOrthogonal
    */
    public function getOrthogonal($oParam){
    
    	$bOriginal = $oParam;
  	  	
    	$bPrime = array($bOriginal[0]);
  	
    	for($i=1; $i<count($bOriginal); $i++) {
  	  
    	  if( $bOriginal[$i-1] ){
  	    
    	    $numerator = $this->_getDotProduct($bPrime[$i-1],$bOriginal[$i]);

      	  $denom = $this->_getDotProduct($bPrime[$i-1],$bPrime[$i-1]);
  	    
    	    $quotient = $numerator/$denom;
  	    
    	    $term = $this->_getScalarProduct($bPrime[$i-1], $quotient);
  	    
    	    $final = $this->_getDifference($bOriginal[$i], $term);

      	  $bPrime[] = $final;
  	    
    	  }
  	  
    	}
  	
    	$result = $bPrime;
  	
    	return $result;
  	
    }
  
    /**
    * Convert basis to an normalized basis.
    * @method getNormalized
    */
    public function getNormalized($oParam){
	
  	  for($i=0; $i<count($oParam); $i++) {
  	    $numerator = $oParam[$i];
  	    $denom = $this->_getNorm($oParam[$i]);
  	    $result[] = $this->_getScalarQuotient($numerator,$denom);
  	  }
  	    	
  	  return $result;
    
    }
  
    /**
    * Convert basis to an orthonormalized basis.
    * @method getOrthnormalizedSet
    */
    public function getOrthnormalizedSet($oParam){
    
      $result = $this->getNormalized($this->getOrthogonal($oParam));
    
      //$result = implode(',', $result);
    
      return $result;
    
    }
  
    //Protected Methods
  
    /**
    * Returns dot product of vectors.
    * @method _getDotProduct
    * @protected
    */
    protected function _getDotProduct ($u,$v){
  	
  	  $uArray = explode(',', $u);
  	
  	  $vArray = explode(',', $v);
  	
  	  for($i=0; $i<count($uArray); $i++) {
  	    $result += $uArray[$i]*$vArray[$i];
  	  }
  	
  	  return $result;
    }

    /**
    * Returns normal of a vector.
    * @method _getNorm
    * @protected
    */
    protected function _getNorm ($u){

    	$uArray = explode(',', $u);

    	for($i=0; $i<count($uArray); $i++) {
    	  $result += $uArray[$i]*$uArray[$i];
    	}

      	$result = sqrt($result);

    	return $result;

    }
  
    /**
    * Returns product of a vector and scalar.
    * @method _getScalarProduct
    * @protected
    */
    protected function _getScalarProduct ($u, $k){
  	
    	$uArray = explode(',', $u);
  	
    	for($i=0; $i<count($uArray); $i++) {
    	  $product[] = $uArray[$i]*$k;
    	}
  	
    	$result = implode(',', $product);
  	
    	return $result;
    
    }

    /**
    * Returns quotient of a vector and scalar.
    * @method _getScalarQuotient
    * @protected
    */
    protected function _getScalarQuotient ($u, $k){

    	$uArray = explode(',', $u);

    	for($i=0; $i<count($uArray); $i++) {
    	  $quotient[] = $uArray[$i]/$k;
    	}

    	$result = implode(',', $quotient);

    	return $result;

    }

    /**
    * Returns difference of two vectors.
    * @method _getDifference
    * @protected
    */
    protected function _getDifference ($u,$v){
    	
    	$uArray = explode(',', $u);
    	
    	$vArray = explode(',', $v);
    	
    	for($i=0; $i<count($uArray); $i++) {
    	  $difference[] = $uArray[$i]-$vArray[$i];
    	}
    	
    	$result = implode(',', $difference);
    	
    	return $result;

    }
  
}

?>
