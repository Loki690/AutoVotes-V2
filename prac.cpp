#include <iostream>
#include <vector>

using namespace std;

const int N = 9;
const int EMPTY = 0;

// Helper function to print the Sudoku grid
void printGrid(vector<vector<int>>& grid) {
    for (int i = 0; i < N; i++) {
        for (int j = 0; j < N; j++) {
            cout << grid[i][j] << " ";
        }
        cout << endl;
    }
}

// Helper function to check if a number can be placed in a given cell
bool isSafe(vector<vector<int>>& grid, int row, int col, int num) {
    // Check if the number already exists in the row
    for (int i = 0; i < N; i++) {
        if (grid[row][i] == num) {
            return false;
        }
    }

    // Check if the number already exists in the column
    for (int i = 0; i < N; i++) {
        if (grid[i][col] == num) {
            return false;
        }
    }

    // Check if the number already exists in the 3x3 box
    int boxRow = row - row % 3;
    int boxCol = col - col % 3;
    for (int i = boxRow; i < boxRow + 3; i++) {
        for (int j = boxCol; j < boxCol + 3; j++) {
            if (grid[i][j] == num) {
                return false;
            }
        }
    }

    // If the number can be placed in the cell, return true
    return true;
}

// Recursive function to solve the Sudoku puzzle using backtracking
bool solveSudoku(vector<vector<int>>& grid, int row, int col) {
    // If we have reached the end of the grid, we have found a solution
    if (row == N) {
        return true;
    }

    // If the current cell is not empty, move to the next cell
    if (grid[row][col] != EMPTY) {
        if (col == N - 1) {
            return solveSudoku(grid, row + 1, 0);
        } else {
            return solveSudoku(grid, row, col + 1);
        }
    }

    // Try to place a number in the current cell
    for (int num = 1; num <= 9; num++) {
        if (isSafe(grid, row, col, num)) {
            grid[row][col] = num;
            if (col == N - 1) {
                if (solveSudoku(grid, row + 1, 0)) {
                    return true;
                }
            } else {
                if (solveSudoku(grid, row, col + 1)) {
                    return true;
                }
            }
            grid[row][col] = EMPTY;
        }
    }

    // If no number can be placed in the current cell, backtrack
    return false;
}

int main() {
    // Initialize the Sudoku grid
    vector<vector<int>> grid = {
        {5, 3, 0, 0, 7, 0, 0, 0, 0},
        {6, 0, 0, 1, 9, 5, 0, 0,
