<?php 

declare(strict_types = 1);

class Customer {
  private int $id;
  private string $firstname;
  private string $lastname;
  private string $email;

  public function __construct(
    string $p_firstname, 
    string $p_lastname,
    string $p_email
    )
    {
      $this->firstname = ucfirst(strtolower($p_firstname));
      $this->lastname = ucfirst(strtolower($p_lastname));
      $this->email = $p_email;
    }
    
    public function getFirstname(): string
    {
        return ucfirst(strtolower($this->firstname));
    }
    public function getLastname(): string
    {
        return ucfirst(strtolower($this->lastname));
    }
    public function getEmail(): string
    {
        return $this->email;
    }
	
	public function insert(): int
	{
		
	}

  }

?>