import React from "react";

const TransferList  = ({transfers}) => (


    <table className="table">
        <tbody>
            {transfers.map(transfer => (
                <tr key={transfer.id}>
                    <td>{transfer.concepto}</td>
                    <td className={transfer.transaccion > 0 ? 'text-success' : 'text-danger'}>{transfer.transaccion}</td>
                </tr>
            )) }
            
        </tbody>
    </table>

)

export default TransferList;