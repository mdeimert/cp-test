import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
import { environment } from 'src/environments/environment';
import { Matchmaking } from '../models/matchmaking';


@Injectable({
  providedIn: 'root'
})
export class StarshipService {

  constructor(private http: HttpClient) { }

  // Http Headers
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  }

  // GET
  GetMatchmaking(): Observable<Matchmaking> {
    return this.http.get<Matchmaking>(environment.backendUrl + '/starships/play')
    .pipe(
      retry(1),
      catchError(this.errorHandl)
    )
  }


  // Error handling
  errorHandl(error) {
      let errorMessage = '';
      if(error.error instanceof ErrorEvent) {
        // Get client-side error
        errorMessage = error.error.message;
      } else {
        // Get server-side error
        errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
      }
      console.log(errorMessage);
      return throwError(errorMessage);
  }


}
