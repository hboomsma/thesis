class Duck 
{
  function quack() 
  {
    echo "Quaaaaack";
  }  

  function fly() 
  {
  	echo "Flap, flap";
  }
}

class Plane 
{
  function fly() 
  {
    echo "Whoeeeesch";
  }
}

function fly_away($object) 
{
  $object->fly();
}

function squeeze($object) 
{
  $object->quack();
}

fly_away(new Duck());  
// echoes Flap, flap

fly_away(new Plane()); 
// echoes Whoeeeesch

squeeze(new Duck());
// echoes Quaaaaack

squeeze(new Plane());  
// throws runtime exception