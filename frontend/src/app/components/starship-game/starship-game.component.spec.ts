import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StarshipGameComponent } from './starship-game.component';

describe('StarshipGameComponent', () => {
  let component: StarshipGameComponent;
  let fixture: ComponentFixture<StarshipGameComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ StarshipGameComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(StarshipGameComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
