import { Component, OnInit } from '@angular/core';
import { StarshipService } from 'src/app/services/starship.service';

@Component({
  selector: 'app-starship-game',
  templateUrl: './starship-game.component.html',
  styleUrls: ['./starship-game.component.scss']
})
export class StarshipGameComponent implements OnInit {

  public matchmaking;
  public history;

  constructor(
    private starshipService: StarshipService
  ) { }

  ngOnInit(): void {
    this.history = {};
  }

  play(): void {
    this.starshipService.GetMatchmaking().toPromise().then((data) => {
      this.matchmaking = data;

      this.matchmaking.starship1.wins = 0;
      this.matchmaking.starship2.wins = 0;

      if(typeof this.history[this.matchmaking[this.matchmaking.winner].id] == 'undefined') {
        this.history[this.matchmaking[this.matchmaking.winner].id] = 1;
      } else {
        this.history[this.matchmaking[this.matchmaking.winner].id] = this.history[this.matchmaking[this.matchmaking.winner].id] + 1;
      }

      this.matchmaking.starship1.wins = (this.history[this.matchmaking.starship1.id]) ? this.history[this.matchmaking.starship1.id] : 0;
      this.matchmaking.starship2.wins = (this.history[this.matchmaking.starship2.id]) ? this.history[this.matchmaking.starship2.id] : 0
    });
  }

}
