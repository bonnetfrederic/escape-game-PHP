<?php 

declare(strict_types = 1);

class Booking {
	private int $id;
  private int $customer_id;
  private int $schedule_id;
  private string $date;
  private int $nb_player;
  private int $total_price;

  public function __construct(
    int $p_customer_id,
    int $p_schedule_id,
    string $p_date,
    int $p_nb_player,
    int $p_total_price
    )
    {
      $this->customer_id = $p_customer_id;
      $this->schedule_id = $p_schedule_id;
      $this->date = $p_date;
      $this->nb_player = $p_nb_player;
      $this->total_price = $p_total_price;
    }  
  }
  
?>