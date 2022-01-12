import ExpenseItem from "./ExpenseItem";
import './Expenses.css';
import ExpensesFilter from "./ExpensesFilter";
import Card from './Card';
import { useState } from "react";

function Expenses({expenses}) {

    const [year, setYear] = useState('2020');

    const onSetYear = (optionYear) => {
        setYear(optionYear);
    }

    const newExpenses = expenses.filter((expense) => {
        return expense.date.getFullYear() == year;
    });

    console.log(newExpenses);

    return (
        <div>
            <Card className="expenses">
                <ExpensesFilter selected={year} onSetYear={onSetYear} />
                {newExpenses.map((expense) => {
                    return <ExpenseItem key={expense.id} title={expense.title} amount={expense.amount} date={expense.date} />
                })}
            </Card>
        </div>
    );
}

export default Expenses;