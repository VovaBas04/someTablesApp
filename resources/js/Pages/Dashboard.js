import React, {useEffect, useRef, useState} from 'react';
import Authenticated from '@/Layouts/Authenticated';
import {Head, Link} from '@inertiajs/inertia-react';
import config from "tailwindcss/defaultConfig";
import Cookies from 'js-cookie'
export default function Dashboard(props) {
    const [books, setBooks] = useState([])
    useEffect(()=> {
        axios.get('/api/books')
            .then(res => {
                setBooks(res.data)
                // console.log(books)
            })
    },[])
    console.log(books)
    // route()
    return (
        <Authenticated
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        Dashboard
                    </div>
                </div>
                {/*<p>{books[0].id}</p>*/}
                <ul> {
                    books.map(book=>(

                <li><Link
                    href={route('books',book.id)}
                    className="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Книга с названием {book.title}
                </Link>
                </li>
                    ))}
                </ul>
            </div>
        </Authenticated>
    );
}
