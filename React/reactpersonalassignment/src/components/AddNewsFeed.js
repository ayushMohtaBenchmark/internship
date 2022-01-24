import React, { useRef } from 'react';
import { useHistory } from 'react-router-dom';

function AddNewsFeed() {

    const titleRef = useRef();
    const descriptionRef = useRef();
    const authorIDRef = useRef();

    const history = useHistory();

    async function submitNewsfeed(event) {
        event.preventDefault();
    
        const newNewsFeed = {
          title: titleRef.current.value,
          description: descriptionRef.current.value,
          author_id: Number(authorIDRef.current.value)
        };
        // console.log(JSON.stringify(newNewsFeed));
        await fetch("http://localhost:8012/yii/restAPIyii/frontend/web/index.php/newsfeeds",{
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          method: "POST",
          body: JSON.stringify(newNewsFeed)
        });
        titleRef.current.value = '';
        descriptionRef.current.value = '';
        authorIDRef.current.value = '';
        history.push('/');
        // getNewsFeed();
    }

    return (
        <div style={{marginTop: '50px', marginLeft: '50px'}}>
            <form onSubmit={submitNewsfeed}>
                <label><strong>Title</strong></label>&nbsp;
                <input type="text" ref={titleRef} /><br /><br />
                <label><strong>Description</strong></label>&nbsp;
                <input type="text" ref={descriptionRef} /><br /><br />
                <label><strong>Author ID</strong></label>&nbsp;
                <input type="number" ref={authorIDRef} /><br /><br />
                <button className='button button1' type='submit'>Add</button>&nbsp;
            </form><br />
      </div>
    )
}

export default AddNewsFeed;
