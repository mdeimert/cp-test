import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { StarshipGameComponent } from './components/starship-game/starship-game.component';
import { StarshipService } from './services/starship.service';
import { HttpClientModule } from '@angular/common/http';
import { StarshipComponent } from './components/starship/starship.component';

@NgModule({
  declarations: [
    AppComponent,
    StarshipGameComponent,
    StarshipComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [
    StarshipService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
